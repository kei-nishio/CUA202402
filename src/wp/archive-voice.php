<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">voice</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-voice-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-voice-sp.webp" alt="海に浮かぶ5人のダイバーをドローンで撮影した様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- Voice -->
  <div class="page-voice page-top treatment">
    <div class="page-voice__inner inner">
      <!-- Categories -->
      <div class="page-voice__categories categories">
        <ul class="categories__items">
          <?php
          // カスタム投稿一覧ページのリンク
          $home_class = (is_post_type_archive('voice')) ? 'is-active' : '';
          $home_link = sprintf(
            '<li class="categories__item %s"><a href="%s" class="categories__link" title="%s">%s</a></li>',
            $home_class,
            esc_url(home_url('/voice')),
            esc_attr(__('View all posts', 'textdomain')),
            esc_html('ALL')
          );
          echo sprintf(esc_html__('%s', 'textdomain'), $home_link);

          // タクソノミーのリンク
          $taxonomy = 'voice_category';
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
                esc_url(get_term_link($term, $taxonomy)), //  タクソノミーページの場合
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
      <ul class="page-voice__cards cards02 cards02--c2">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php
            $post_id = get_the_ID(); // 投稿の ID を指定
            $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
            ?>
            <?php
            $taxonomy = 'voice_category';
            $terms = get_the_terms($post_id, $taxonomy);
            $term = $terms[0]->name;
            // カスタムフィールドの値を取得
            $age_gender = esc_html(get_field('acf_age_gender'));
            $image = get_field('acf_customer_image');
            $customer_voice = esc_html(get_field('acf_customer_voice'));
            // タクソノミーと画像URLの取得
            $customer_category = esc_html($term);
            $image_url = esc_url($image['url']);
            $image_alt = esc_attr($image['alt']);
            ?>
            <li class="cards02__card">
              <div class="card-voice">
                <div class="card-voice__body">
                  <div class="card-voice__flex">
                    <div class="card-voice__heading">
                      <div class="card-voice__meta">
                        <p class="card-voice__information"><?php echo $age_gender; ?></p>
                        <span class="card-voice__category category-diving"><?php echo $customer_category; ?></span>
                      </div>
                      <h3 class="card-voice__title"><?php the_title(); ?></h3>
                    </div>
                    <figure class="card-voice__image js-colorbox">
                      <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt ?>" />
                    </figure>
                  </div>
                  <div class="card-voice__content">
                    <p class="card-voice__text"><?php echo $customer_voice; ?></p>
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
      <div class="page-voice__pagination">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>