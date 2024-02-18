<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">campaign</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-campaign-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-campaign-sp.webp" alt="2匹の黄色熱帯魚が浅瀬近くを泳いでいる様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- Campaign -->
  <div class="page-campaign page-top treatment">
    <div class="page-campaign__inner inner">
      <!-- Categories -->
      <div class="page-campaign__categories categories">
        <ul class="categories__items">
          <?php
          // カスタム投稿一覧ページのリンク
          $home_class = (is_post_type_archive('campaign')) ? 'is-active' : '';
          $home_link = sprintf(
            '<li class="categories__item %s"><a href="%s" class="categories__link" title="%s">%s</a></li>',
            $home_class,
            esc_url(home_url('/campaign')),
            esc_attr(__('View all posts', 'textdomain')),
            esc_html('ALL')
          );
          echo sprintf(esc_html__('%s', 'textdomain'), $home_link);

          // タクソノミーのリンク
          $taxonomy = 'campaign_category';
          $current_term_id = get_queried_object_id();
          $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'ID',
            'order'   => 'ASC',
            'number'  => 5
          ));
          if ($terms) {
            foreach ($terms as $term) {
              $term_class = ($current_term_id === $term->term_id) ? 'is-active' : '';
              $term_link = sprintf(
                '<li class="categories__item %s"><a href="%s" class="categories__link" title="%s">%s</a></li>',
                $term_class,
                // esc_url(get_category_link($term->term_id)), // カテゴリーページの場合
                esc_url(get_term_link($term, $taxonomy)), // タクソノミーページの場合
                esc_attr(sprintf(__('View posts in %s', 'textdomain'), $term->name)),
                esc_html($term->name)
              );
              echo sprintf(esc_html__('%s', 'textdomain'), $term_link);
            }
          }
          ?>
        </ul>
      </div>

      <!-- Cards -->
      <ul class="page-campaign__cards cards02 cards02--c2">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php
            $post_id = get_the_ID(); // 投稿の ID を指定
            $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
            ?>
            <li class="cards02__card">
              <div class="card-campaign card-campaign--large">
                <div class="card-campaign__body">
                  <figure class="card-campaign__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
                    <?php endif; ?>
                  </figure>
                  <div class="card-campaign__meta">
                    <?php
                    // タクソノミーを表示
                    $taxonomy = 'campaign';
                    $terms = get_the_terms($post_id, $taxonomy);
                    if (!is_wp_error($terms) && !empty($terms)) :
                    ?>
                      <span class="card-campaign__category category-diving">
                        <?php echo esc_html($terms[0]->name); ?>
                      </span>
                    <?php endif; ?>
                    <h3 class="card-campaign__title"><?php the_title(); ?></h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <?php
                      // カスタムフィールドを取得
                      $price_before = number_format(get_field('acf_parice_before'));
                      $price_after = number_format(get_field('acf_parice_after'));
                      $campaign_message = get_field('acf_campaign_message');
                      $campaign_date_from = get_field('acf_date_from');
                      $campaign_date_to = get_field('acf_date_to');
                      // カスタムフィールド値の整形
                      $standardDateFrom = date("c", strtotime($campaign_date_from));
                      $standardDateTo = date("c", strtotime($campaign_date_to));
                      $formattedDateFrom = date("Y/n/j", strtotime($campaign_date_from));
                      $formattedDateTo = date("n/j", strtotime($campaign_date_to));
                      ?>
                      <span class="card-campaign__price-before"><?php echo esc_html('¥' . $price_before); ?></span>
                      <span class="card-campaign__price-after"><?php echo esc_html('¥' . $price_after); ?></span>
                    </div>
                    <p class="card-campaign__main-text u-desktop">
                      <?php echo esc_html($campaign_message); ?>
                    </p>
                  </div>
                  <div class="card-campaign__contact u-desktop">
                    <div class="card-campaign__term">
                      <time datetime="<?php echo esc_attr($standardDateFrom); ?>"><?php echo esc_html($formattedDateFrom); ?></time>
                      &#045;
                      <time datetime="<?php echo esc_attr($standardDateTo); ?>"><?php echo esc_html($formattedDateTo); ?></time>
                    </div>
                    <p class="card-campaign__contact-text">ご予約・お問合せはコチラ</p>
                    <div class="card-campaign__button">
                      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button">
                        <p>contact us</p>
                        <div class="button__arrow arrow"></div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        <?php else : ?>
          <li>記事が投稿されていません</li>
        <?php endif; ?>
      </ul>

      <!-- Pagination -->
      <div class="page-campaign__pagination">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>

<?php get_footer(); ?>