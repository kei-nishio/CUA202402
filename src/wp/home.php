<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">blog</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-blog-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-blog-sp.webp" alt="小魚の群れが水色の澄んだ海を泳いでいる様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- blog -->
  <div class="page-blog page-top treatment">
    <div class="page-blog__inner inner">
      <div class="page-blog__body">
        <!-- Left side -->
        <div class="page-blog__left-side">
          <ul class="page-blog__cards cards01 cards01--c2">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <li class="cards01__card">
                  <?php get_template_part('/parts/card/p-card-blog') ?>
                </li>
              <?php endwhile; ?>
            <?php else : ?>
              <li>記事が投稿されていません</li>
            <?php endif; ?>
          </ul>

          <!-- Pagination -->
          <div class="page-blog__pagination">
            <?php // wp_pagenavi(); 
            ?>
            <?php
            if (wp_is_mobile()) :
              $mid_size = 1;
            else :
              $mid_size = 2;
            endif;
            $args = array(
              'prev_text' => '<span></span>',
              'next_text' => '<span></span>',
              'mid_size' => $mid_size, // 現在ページの左右に表示するページ番号の数
              'end_size' => 0, // 末尾のページ番号リンクの数
            );
            the_posts_pagination($args);
            ?>
          </div>
        </div>
        <!-- Right side -->
        <aside class="page-blog__right-side">
          <div class="sidebar">
            <!-- 人気記事 -->
            <section class="sidebar__article">
              <div class="sidebar__title">
                <div class="sidebar__title-icon">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/ornaments/fish-whale-green.png" alt="緑色のクジラのアイコン" />
                </div>
                <h2 class="sidebar__title-text">人気記事</h2>
              </div>
              <?php
              /**
               * Popular Posts Widget 
               * @link https://wordpress.org/plugins/wordpress-popular-posts/
               * @link https://github.com/cabrerahector/wordpress-popular-posts/wiki/2.-Template-tags#content-tags
               * @uses 引数名は上記の公式ドキュメントで有効かチェックしてください
               * @deprecated <time></time>タグは反映されないのでdivタグで囲むこと。
               */
              $args = array(
                'range' => 'all', // 集計する期間。'daily', 'weekly', 'monthly', 'all'のいずれかを指定。
                'order_by' => 'views', // 並び替えの基準。'views' (閲覧数) や 'comments' (コメント数) など。
                'limit' => 3, // 表示する投稿の数。
                'title_length' => 14, // タイトルを短縮する場合の文字数。
                'thumbnail_width' => 120, // サムネイル画像の幅。
                'thumbnail_height' => 90, // サムネイル画像の高さ。
                'stats_date' => true, // 投稿日を表示するかどうか。表示する場合は、日付フォーマットを指定。
                'stats_date_format' => 'Y.m/d', // 日付のフォーマット。
                'wpp_start' => '<ul class="sidebar__popular-article-cards">', // 投稿リストの開始をマークするHTML。
                'wpp_end' => '</ul>', // 投稿リストの終了をマークするHTML。
                'post_html' => '
                  <li class="sidebar__popular-article-card card-article">
                    <a href="{url}" class="card-article__link">
                      <figure class="card-article__image">
                        <img src="{thumb_url}" alt="人気記事のアイキャッチ画像">
                      </figure>
                      <div class="card-article__text">
                        <div class="card-article__date">{date}</div>
                        <h3 class="card-article__title">{text_title}</h3>
                      </div>
                    </a>
                  </li>', // 各投稿を表示する際のHTML構造。
              );
              wpp_get_mostpopular($args);
              ?>
            </section>

            <!-- 口コミ -->
            <section class="sidebar__article">
              <div class="sidebar__title">
                <div class="sidebar__title-icon">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/ornaments/fish-whale-green.png" alt="緑色のクジラのアイコン" />
                </div>
                <h2 class="sidebar__title-text">口コミ</h2>
              </div>

              <?php
              $args = array(
                "post_type" => "voice", //post通常投稿
                "posts_per_page" => 1, //表示件数（-1で全件）
                "orderby" => "date", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
                "order" => "DESC", //ACS昇順、DESC降順
              );
              $the_query = new WP_Query($args);
              ?>
              <ul class="sidebar__review-cards">
                <?php if ($the_query->have_posts()) : ?>
                  <?php $i = 0 ?>
                  <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                    // カスタムフィールドの値を取得
                    $age_gender = esc_html(get_field('acf_age_gender'));
                    $image = get_field('acf_customer_image');
                    // 画像URLの取得
                    $image_url = esc_url($image['url']);
                    $image_alt = esc_attr($image['alt']);
                    ?>
                    <li class="sidebar__review-card card-review">
                      <figure class="card-review__image">
                        <img src="<?php echo $image_url ?>" alt="<?php echo $image_url ?>" />
                      </figure>
                      <div class="card-review__tag"><?php echo $age_gender; ?></div>
                      <h3 class="card-review__title"><?php the_title(); ?></h3>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php else : ?>
                  <li>記事が投稿されていません</li>
                <?php endif; ?>
              </ul>
              <div class="sidebar__button-review">
                <a href="<?php echo esc_url(home_url('/voice')); ?>" class="button">
                  <p>view more</p>
                  <div class="button__arrow arrow"></div>
                </a>
              </div>
            </section>

            <!-- キャンペーン -->
            <section class="sidebar__article">
              <div class="sidebar__title">
                <div class="sidebar__title-icon">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/ornaments/fish-whale-green.png" alt="緑色のクジラのアイコン" />
                </div>
                <h2 class="sidebar__title-text">キャンペーン</h2>
              </div>

              <?php
              $args = array(
                "post_type" => "campaign", //post通常投稿
                "posts_per_page" => 2, //表示件数（-1で全件）
                "orderby" => "date", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
                "order" => "DESC", //ACS昇順、DESC降順
              );
              $the_query = new WP_Query($args);
              ?>
              <ul class="sidebar__campaign-cards">
                <?php if ($the_query->have_posts()) : ?>
                  <?php $i = 0 ?>
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
                    ?>
                    <li class="sidebar__campaign-card">
                      <div class="card-campaign card-campaign--sidebar">
                        <div class="card-campaign__body">
                          <figure class="card-campaign__image">
                            <?php if (has_post_thumbnail()) : ?>
                              <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
                            <?php else : ?>
                              <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
                            <?php endif; ?>
                          </figure>
                          <div class="card-campaign__meta">
                            <h3 class="card-campaign__title"><?php the_title(); ?></h3>
                          </div>
                          <div class="card-campaign__content">
                            <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                            <div class="card-campaign__prices">
                              <span class="card-campaign__price-before"><?php echo $price_before; ?></span>
                              <span class="card-campaign__price-after"><?php echo $price_after; ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php else : ?>
                  <li>記事が投稿されていません</li>
                <?php endif; ?>
              </ul>
              <div class="sidebar__button-campaign">
                <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="button">
                  <p>view more</p>
                  <div class="button__arrow arrow"></div>
                </a>
              </div>
            </section>

            <!-- アーカイブ -->
            <section class="sidebar__article">
              <div class="sidebar__title">
                <div class="sidebar__title-icon">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/ornaments/fish-whale-green.png" alt="緑色のクジラのアイコン" />
                </div>
                <h2 class="sidebar__title-text">アーカイブ</h2>
              </div>

              <ul class="sidebar__archive-lists">
                <?php
                $archives = wp_get_archives(array(
                  'type'            => 'monthly', // monthly, yearly, daily, weekly, postbypost, alpha
                  'limit'           => '12', // 表示件数
                  'format'          => 'custom', // html, custom, option, link
                  'before'          => '', // リンクの前に表示するテキスト
                  'after'           => '', // リンクの後に表示するテキスト
                  'show_post_count' => false, // 投稿数を表示するか
                  'echo'            => 0 // 1で表示、0で取得
                ));
                // 正規表現を使って各アーカイブ項目を配列に格納
                preg_match_all('/href=\'(.+?)\'>(.+?)<\/a>/', $archives, $matches);
                // アーカイブリストを年ごとに整理
                $archives_by_year = [];
                foreach ($matches[2] as $index => $text) :
                  // 年と月をテキストから抽出
                  $year = substr($text, 0, 7);
                  $month = substr($text, 7);
                  // 年毎の配列を作成
                  if (!array_key_exists($year, $archives_by_year)) :
                    $archives_by_year[$year] = [];
                  endif;
                  // リンクを配列に追加
                  $archives_by_year[$year][] = '<li class="sidebar__archive-month"><a href="' . esc_url($matches[1][$index]) . '">' . esc_html($month) . '</a></li>';
                endforeach;
                // 各年ごとに<ul>リストを作成して出力
                foreach ($archives_by_year as $year => $months) :
                  echo '<li class="sidebar__archive-list">';
                  echo '<span class="sidebar__archive-year js-archive-button">' . esc_html($year) . '</span>';
                  echo '<ul class="sidebar__archive-months">';
                  echo implode('', $months);
                  echo '</ul>';
                  echo '</li>';
                endforeach;
                ?>
              </ul>
            </section>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>