<?php get_header(); ?>
<main class="main">
  <!-- Loading -->
  <div class="loading js-load">
    <div class="loading__inner">
      <div class="loading__heading">
        <h2 class="loading__text-large">diving</h2>
        <p class="loading__text-small">into the ocean</p>
      </div>
      <div class="loading__flex">
        <?php
        // カスタムフィールドの1つ目からローディング画像の取得
        $image_pc = get_field('acf_fv_image_pc_1');
        $image_sp = get_field('acf_fv_image_sp_1');
        $image_no_image = get_template_directory_uri() . '/assets/images/common/noimage.jpg';
        // PC画像がある場合はPC画像を、ない場合はnoimageを表示
        if ($image_pc) {
          $url_pc = esc_url($image_pc['url']);
          $alt = esc_attr($image_pc['alt']);
        } else {
          $url_pc = $image_no_image;
          $alt = 'ノーイメージ';
        }
        // SP画像がある場合はSP画像を、ない場合はnoimageを表示
        if ($image_sp) {
          $url_sp = esc_url($image_sp['url']);
        } else {
          $url_sp = $image_no_image;
        }
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
              <?php
              // カスタムフィールドから4つの画像を取得
              for ($i = 1; $i <= 4; $i++) {
                $image_pc = get_field('acf_fv_image_pc_' . $i);
                $image_sp = get_field('acf_fv_image_sp_' . $i);
                $image_no_image = get_template_directory_uri() . '/assets/images/common/noimage.jpg';
                if ($image_pc) {
                  $url_pc = esc_url($image_pc['url']);
                  $alt = esc_attr($image_pc['alt']);
                } else {
                  $url_pc = $image_no_image;
                  $alt = 'ノーイメージ';
                }
                if ($image_sp) {
                  $url_sp = esc_url($image_sp['url']);
                } else {
                  $url_sp = $image_no_image;
                }
              ?>
                <li class="swiper-slide">
                  <picture class="main-view__image">
                    <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
                    <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
                  </picture>
                </li>
              <?php
              }
              ?>
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
              <?php
              // 2回ループして2倍の記事を取得（swiper10用）
              for ($i = 0; $i < 2; $i++) {
              ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <?php
                  // 公開/非公開の判定
                  $public = get_field('acf_campaign_public');
                  if ($public === false) {
                    continue;
                    // 全ての記事が非公開の時はカードが表示されなくなります。
                  }
                  ?>
                  <li class="swiper-slide">
                    <div class="campaign__card card-campaign">
                      <?php
                      $post_id = get_the_ID(); // 投稿の ID を指定
                      $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
                      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
                      ?>
                      <a href="./campaign.html" class="card-campaign__link">
                        <figure class="card-campaign__image">
                          <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
                          <?php else : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
                          <?php endif; ?>
                        </figure>
                        <div class="card-campaign__meta">
                          <?php
                          // タクソノミーの表示
                          $taxonomy = 'diving_category';
                          $terms = get_the_terms($post_id, $taxonomy);
                          if (!is_wp_error($terms) && !empty($terms)) {
                            echo '<span class="card-campaign__category category-diving">' . esc_html($terms[0]->name) . '</span>';
                          }
                          ?>
                          <h3 class="card-campaign__title"><?php the_title(); ?></h3>
                        </div>
                        <div class="card-campaign__content">
                          <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>

                          <div class="card-campaign__prices">
                            <?php
                            // カスタムフィールドの金額を取得
                            $price_before = number_format(get_field('acf_parice_before'));
                            $price_after = number_format(get_field('acf_parice_after'));
                            ?>
                            <span class="card-campaign__price-before">&#165;<?php echo $price_before; ?></span>
                            <span class="card-campaign__price-after">&#165;<?php echo $price_after; ?></span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                <?php endwhile; ?>
              <?php } ?>
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
        <a href="./campaign.html" class="button">
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
              <a href="./about-us.html" class="button">
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
          <h3 class="information__sub-title">ライセンス講習</h3>
          <p class="information__text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。
            <br />
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__button">
            <a href="./information.html" class="button">
              <p>view more</p>
              <div class="button__arrow arrow"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <section id="blog" class="blog treatment">
    <div class="blog__inner inner">
      <div class="blog__title section-title section-title--white-pc">
        <div class="section-title__en">blog</div>
        <h2 class="section-title__ja">ブログ</h2>
      </div>
      <ul class="blog__cards cards01 cards01--c3">
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
            <?php
            $post_id = get_the_ID(); // 投稿の ID を指定
            $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
            ?>
            <li class="cards01__card">
              <div class="card-blog">
                <a href="<?php the_permalink(); ?>" class="card-blog__link">
                  <figure class="card-blog__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
                    <?php endif; ?>
                  </figure>
                  <div class="card-blog__body">
                    <time class="card-blog__date" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>
                    <h3 class="card-blog__title"><?php the_title(); ?></h3>
                    <div class="card-blog__content">
                      <p class="card-blog__text">
                        <?php echo esc_html(mb_strimwidth(strip_tags(get_the_content()), 0, 100 * 2, '')); ?>
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>記事が投稿されていません</li>
        <?php endif; ?>
      </ul>
      <div class="blog__button">
        <a href="./blog.html" class="button">
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
        "posts_per_page" => -1, //表示件数（-1で全件）
        "orderby" => "date", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
        "order" => "DESC", //ACS昇順、DESC降順
      );
      $the_query = new WP_Query($args);
      ?>
      <ul class="voice__cards cards02 cards02--c2">
        <?php if ($the_query->have_posts()) : ?>
          <?php $i = 0 ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            // 公開/非公開の判定
            $public = get_field('acf_voice_public');
            if ($public === false) {
              continue;
            }
            // 記事を2つだけ表示する
            if ($i >= 2) {
              break;
            }
            $i++;
            ?>
            <?php
            $post_id = get_the_ID(); // 投稿の ID を指定
            $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
            ?>
            <?php
            // カスタムフィールドの値を取得
            $age_gender = esc_html(get_field('acf_age_gender'));
            $customer_category_id = get_field('acf_diving_category');
            $image = get_field('acf_customer_image');
            $customer_voice = esc_html(get_field('acf_customer_voice'));
            // タクソノミーと画像URLの取得
            $taxonomy = 'diving_category';
            $customer_category = esc_html(get_term($customer_category_id, $taxonomy)->name);
            $image_url = esc_url($image['url']);
            $image_alt = esc_attr($image['alt']);
            ?>
            <?php echo esc_attr($alt); ?>
            <li class="cards02__card">
              <div class="card-voice">
                <a href="./voice.html" class="card-voice__link">
                  <div class="card-voice__body">
                    <div class="card-voice__flex">
                      <div class="card-voice__heading">
                        <div class="card-voice__meta">
                          <p class="card-voice__information">
                            <?php echo $age_gender; ?></p>
                          <span class="card-voice__category category-diving"><?php echo $customer_category; ?></span>
                        </div>
                        <h3 class="card-voice__title"><?php the_title(); ?></h3>
                      </div>
                      <figure class="card-voice__image js-colorbox">
                        <img src="<?php echo $image_url ?>" alt="<?php echo $image_url ?>" />
                      </figure>
                    </div>
                    <div class="card-voice__content">
                      <p class="card-voice__text">
                        <?php echo $customer_voice; ?>
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>記事が投稿されていません</li>
        <?php endif; ?>
      </ul>

      <div class="voice__button">
        <a href="./voice.html" class="button">
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
              <?php $post_id = get_the_ID(); ?>
              <?php $category_group = 'scf_diving_category_group'; ?>
              <li class="price__list">
                <div class="diving-products">
                  <h3 class="diving-products__category"><?php the_title(); ?></h3>
                  <dl class="diving-products__list">
                    <?php
                    $fields = SCF::get($category_group, $post_id);
                    foreach ($fields as $field) {
                    ?>
                      <dt class="diving-products__name">
                        <?php echo esc_html($field['scfdivingcategorycourse']); ?>
                      </dt>
                      <dd class="diving-products__price">
                        <?php echo esc_html('¥' . number_format($field['scfdivingcategoryprice'])); ?>
                      </dd>
                    <?php } ?>
                  </dl>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <li>記事が投稿されていません</li>
          <?php endif; ?>
        </ul>
        <figure class="price__image-pc u-desktop js-colorbox">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/price02-pc.webp" alt="サンゴ礁の海を緋色の小魚の群れが泳いでいる様子" />
        </figure>
      </div>
      <div class="price__button">
        <a href="./price.html" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="contact top-contact treatment">
    <div class="contact__inner inner">
      <div class="contact__body">
        <div class="contact__access">
          <div class="contact__logo">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-green.svg" alt="コードアップス" />
          </div>
          <div class="contact__flex">
            <address class="contact__store-info">
              <ul>
                <li>沖縄県那覇市1-1</li>
                <li>
                  TEL:
                  <a href="tel:0120-000-0000">0120-000-0000</a>
                </li>
                <li>営業時間:8:30-19:00</li>
                <li>定休日:毎週火曜日</li>
              </ul>
            </address>

            <div class="contact__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.5153396566434!2d127.67573737591492!3d26.21243987707159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5699e88a1f5b9%3A0x754ce0d09feedce9!2z44CSOTAwLTAwMjEg5rKW57iE55yM6YKj6KaH5biC5rOJ5bSO77yR5LiB55uu77yZ4oiS77yR77yZIOaylue4hOecjOW6gQ!5e0!3m2!1sja!2sjp!4v1689072805198!5m2!1sja!2sjp" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__guide">
          <div class="contact__title section-title section-title--large">
            <div class="section-title__en">contact</div>
            <h2 class="section-title__ja">お問合せ</h2>
          </div>
          <p class="contact__text">ご予約・お問合せはコチラ</p>
          <div class="contact__button">
            <a href="./contact.html" class="button">
              <p>contact us</p>
              <div class="button__arrow arrow"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>