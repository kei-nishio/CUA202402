<?php get_header(); ?>
<main>
  <!-- Loading -->
  <div class="loading js-load">
    <div class="loading__inner">
      <div class="loading__heading">
        <h2 class="loading__text-large">diving</h2>
        <p class="loading__text-small">into the ocean</p>
      </div>
      <div class="loading__flex js-loading-flex">
        <?php
        // カスタムフィールドの1つ目からローディング画像の取得
        $front_page_id = get_option('page_on_front');
        $image_pc = get_field('acf_fv_image_pc_1', $front_page_id);
        $image_sp = get_field('acf_fv_image_sp_1', $front_page_id);
        $image_no_image = get_template_directory_uri() . '/assets/images/common/noimage.jpg';
        // PC画像がある場合はPC画像を、ない場合はnoimageを表示
        if ($image_pc) :
          $url_pc = esc_url($image_pc['url']);
          $alt = esc_attr($image_pc['alt']);
        else :
          $url_pc = $image_no_image;
          $alt = 'ノーイメージ';
        endif;
        // SP画像がある場合はSP画像を、ない場合はnoimageを表示
        if ($image_sp) :
          $url_sp = esc_url($image_sp['url']);
        else :
          $url_sp = $image_no_image;
        endif;
        ?>
        <div class="loading__left">
          <picture class="loading__image js-loading-left">
            <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
            <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
          </picture>
        </div>
        <div class="loading__right">
          <picture class="loading__image js-loading-right">
            <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
            <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
          </picture>
        </div>
      </div>
    </div>
  </div>

  <!-- Main view -->
  <section class="main-view">
    <div class="main-view__inner">
      <div class="main-view__body">
        <div class="main-view__heading">
          <h2 class="main-view__text-large">diving</h2>
          <p class="main-view__text-small">into the ocean</p>
        </div>

        <!-- Main View Swiper -->
        <div class="main-view__swiper js-main-view-swiper">
          <div class="swiper">
            <ul class="swiper-wrapper">
              <?php $front_page_id = get_option('page_on_front'); ?>
              <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php
                // カスタムフィールドから4つの画像を取得
                $image_pc = get_field('acf_fv_image_pc_' . $i, $front_page_id);
                $image_sp = get_field('acf_fv_image_sp_' . $i, $front_page_id);
                $image_no_image = get_template_directory_uri() . '/assets/images/common/noimage.jpg';
                if ($image_pc) :
                  $url_pc = esc_url($image_pc['url']);
                  $alt = esc_attr($image_pc['alt']);
                else :
                  $url_pc = $image_no_image;
                  $alt = 'ノーイメージ';
                endif;
                if ($image_sp) :
                  $url_sp = esc_url($image_sp['url']);
                else :
                  $url_sp = $image_no_image;
                endif;
                ?>
                <li class="swiper-slide">
                  <picture class="main-view__image">
                    <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
                    <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
                  </picture>
                </li>
              <?php endfor; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Campaign -->
  <section id="campaign" class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__title section-title">
        <div class="section-title__en">campaign</div>
        <h2 class="section-title__ja">キャンペーン</h2>
      </div>

      <!-- Campaign Swiper -->
      <div class="campaign__swiper js-campaign-swiper">
        <div class="swiper">
          <?php
          // サブループからキャンペーン記事を取得
          $args = array(
            "post_type" => "campaign", //post通常投稿
            "posts_per_page" => -1, //表示件数（-1で全件）
            "orderby" => "modified", // data投稿日時、modified最終更新日時
            "order" => "DESC", //ACS昇順、DESC降順
          );
          $the_query = new WP_Query($args);
          ?>
          <ul class="swiper-wrapper">
            <?php if ($the_query->have_posts()) : ?>
              <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <?php
                  $post_id = get_the_ID(); // 投稿の ID を指定
                  $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
                  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
                  ?>
                  <?php
                  // カスタムフィールドの金額を取得
                  $price_before = get_field('acf_parice_before');
                  if ($price_before !== "") {
                    $price_before = esc_html('¥' . number_format(get_field('acf_parice_before')));
                  }
                  $price_after = esc_html('¥' . number_format(get_field('acf_parice_after')));
                  // タクソノミーを表示
                  $taxonomy = 'campaign_category';
                  $terms = get_the_terms($post_id, $taxonomy);
                  $term_url = esc_url(get_term_link($terms[0], $taxonomy));
                  ?>
                  <li class="swiper-slide">
                    <div class="campaign__card card-campaign">
                      <a href="<?php echo $term_url; ?>" class="card-campaign__link">
                        <figure class="card-campaign__image">
                          <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
                          <?php else : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
                          <?php endif; ?>
                        </figure>
                        <div class="card-campaign__meta">
                          <?php if (!is_wp_error($terms) && !empty($terms)) : ?>
                            <span class="card-campaign__category category-diving"><?php echo esc_html($terms[0]->name); ?></span>
                          <?php endif; ?>
                          <h3 class="card-campaign__title"><?php the_title(); ?></h3>
                        </div>
                        <div class="card-campaign__content">
                          <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                          <div class="card-campaign__prices">
                            <span class="card-campaign__price-before"><?php echo $price_before; ?></span>
                            <span class="card-campaign__price-after"><?php echo $price_after; ?></span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                <?php endwhile; ?>
              <?php endfor; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <li>記事が投稿されていません</li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="swiper-button-prev campaign__swiper-prev">
          <div class="button-slide">
            <div class="button-slide__arrow-left arrow arrow--mirror arrow--green"></div>
          </div>
        </div>
        <div class="swiper-button-next campaign__swiper-next">
          <div class="button-slide">
            <div class="button-slide__arrow-right arrow arrow--green"></div>
          </div>
        </div>
      </div>

      <div class="campaign__button">
        <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- About us -->
  <section id="about-us" class="about-us top-about-us treatment">
    <div class="about-us__inner inner">
      <div class="about-us__title section-title">
        <div class="section-title__en">about us</div>
        <h2 class="section-title__ja">私たちについて</h2>
      </div>

      <div class="about-us__body">
        <div class="about-us__images-box">
          <div class="about-us__images">
            <div class="about-us__image01">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/about-us/about-us01.webp" alt="青い空を背景にしてレンガ色の瓦にシーサーがいる様子" />
            </div>
            <div class="about-us__image02">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/about-us/about-us02.webp" alt="浅瀬の透き通った海中に2匹の黄色い熱帯魚が泳いでいる様子" />
            </div>
          </div>
        </div>
        <div class="about-us__container">
          <div class="about-us__heading">
            Dive into
            <br />
            the Ocean
          </div>
          <div class="about-us__text-box">
            <p class="about-us__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br />
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
            </p>
            <div class="about-us__button">
              <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="button">
                <p>view more</p>
                <div class="button__arrow arrow"></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Information -->
  <section id="information" class="information top-information">
    <div class="information__inner inner">
      <div class="information__title section-title">
        <div class="section-title__en">information</div>
        <h2 class="section-title__ja">ダイビング情報</h2>
      </div>
      <div class="information__body">
        <div class="information__image-container">
          <figure class="information__image js-colorbox">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/information01.webp" alt="サンゴ礁と黄色い熱帯魚" />
          </figure>
        </div>
        <div class="information__text-box">
          <?php
          $taxonomy = 'information_category';
          $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'rand',
            'number'  => 0, // 0なら全件取得
          ));
          $term = $terms[0];
          $term_name = $term->name;
          $term_description = $term->description;
          ?>
          <h3 class="information__sub-title"><?php echo esc_html($term_name); ?></h3>
          <p class="information__text"><?php echo esc_html($term_description); ?></p>
          <div class="information__button">
            <a href="<?php echo esc_url(home_url('/information')); ?>" class="button">
              <p>view more</p>
              <div class="button__arrow arrow"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <section id="blog" class="top-blog treatment">
    <div class="top-blog__inner inner">
      <div class="top-blog__title section-title section-title--white-pc">
        <div class="section-title__en">blog</div>
        <h2 class="section-title__ja">ブログ</h2>
      </div>
      <ul class="top-blog__cards cards01 cards01--c3">
        <?php
        $args = array(
          "post_type" => "post", //post通常投稿
          "posts_per_page" => 3, //表示件数（-1で全件）
          "orderby" => "date", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
          "order" => "DESC", //ACS昇順、DESC降順
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="cards01__card">
              <?php get_template_part('/parts/card/p-card-blog') ?>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>記事が投稿されていません</li>
        <?php endif; ?>
      </ul>
      <div class="top-blog__button">
        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Voice -->
  <section id="voice" class="voice top-voice treatment">
    <div class="voice__inner inner">
      <div class="voice__title section-title">
        <div class="section-title__en">voice</div>
        <h2 class="section-title__ja">お客様の声</h2>
      </div>
      <?php
      $args = array(
        "post_type" => "voice", //post通常投稿
        "posts_per_page" => 2, //表示件数（-1で全件）
        "orderby" => "date", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
        "order" => "DESC", //ACS昇順、DESC降順
      );
      $the_query = new WP_Query($args);
      ?>
      <ul class="voice__cards cards02 cards02--c2">
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="cards02__card">
              <?php get_template_part('/parts/card/p-card-voice') ?>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>記事が投稿されていません</li>
        <?php endif; ?>
      </ul>

      <div class="voice__button">
        <a href="<?php echo esc_url(home_url('/voice')); ?>" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Price -->
  <section id="price" class="price top-price treatment">
    <div class="price__inner inner">
      <div class="voice__title section-title">
        <div class="section-title__en">price</div>
        <h2 class="section-title__ja">料金一覧</h2>
      </div>
      <div class="price__body">
        <figure class="price__image-sp u-mobile js-colorbox">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/price01-sp.webp" alt="海を泳ぐアカウミガメを右側から撮影した写真" />
        </figure>
        <?php
        $args = array(
          "post_type" => "price_custom", //post通常投稿
          "posts_per_page" => -1, //表示件数（-1で全件）
          "orderby" => "ID", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
          "order" => "DESC", //ACS昇順、DESC降順
        );
        $the_query = new WP_Query($args);
        ?>
        <ul class="price__lists">
          <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php if (get_the_title() !== "") : ?>
                <?php
                // タイトルがある場合のみ処理を続行する
                $post_id = get_the_ID();
                $field_group = 'scf_diving_category_group';
                $field_course = 'scfdivingcategorycourse';
                $field_price = 'scfdivingcategoryprice';
                $result_not_empty = check_fields_not_empty($post_id, $field_group);
                $result_numeric = check_fields_numeric($post_id, $field_group, $field_price);
                $fields = SCF::get($field_group, $post_id);
                // フィールド値に空白がないかつ価格が半角数字の場合のみ処理を続行する
                ?>
                <?php if ($result_not_empty === false || $result_numeric === false) continue; ?>
                <li class="price__list">
                  <div class="diving-products">
                    <h3 class="diving-products__category"><?php the_title(); ?></h3>
                    <dl class="diving-products__list">
                      <?php foreach ($fields as $field) : ?>
                        <?php
                        $course = str_replace('|', '', $field[$field_course]);
                        $price = esc_html('¥' . number_format($field[$field_price]));
                        ?>
                        <dt class="diving-products__name"><?php echo $course; ?></dt>
                        <dd class="diving-products__price"><?php echo $price; ?></dd>
                      <?php endforeach; ?>
                    </dl>
                  </div>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <li>料金はお問合せフォームよりお問い合わせ願います。</li>
          <?php endif; ?>
        </ul>
        <figure class="price__image-pc u-desktop js-colorbox">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/price02-pc.webp" alt="サンゴ礁の海を緋色の小魚の群れが泳いでいる様子" />
        </figure>
      </div>
      <div class="price__button">
        <a href="<?php echo esc_url(home_url('/price')); ?>" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>