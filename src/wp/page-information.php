<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">information</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-information-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-information-sp.webp" alt="海の中を泳ぐダイバーと熱帯魚の群れの様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- Information -->
  <div class="page-information page-top page-top--long treatment">
    <div class="page-information__inner inner">
      <div class="page-information__body">
        <?php
        $taxonomy = 'campaign_category';
        $number = 0; // 0なら全件取得
        $terms = get_terms(array(
          'taxonomy' => $taxonomy,
          'orderby' => 'ID',
          'order'   => 'ASC',
          'number'  => $number
        ));
        ?>
        <!-- Categories -->
        <div class="page-information__categories categories-with-whale">
          <ul class="categories-with-whale__items">
            <?php
            if ($terms) {
              foreach ($terms as $term) {
                $term_id = $term->term_id;
                $term_name = $term->name;
                $term_slug = $term->slug;
                // アイコンのファイル名
                $term_icon = 'icon_' . $term_slug . '.png';
                $term_icon_path = get_theme_file_path() . '/assets/images/diving_category/' . $term_icon;
                if (file_exists($term_icon_path)) {
                  $term_icon_url = get_theme_file_uri() . '/assets/images/diving_category/' . $term_icon;
                } else {
                  $term_icon_url = get_theme_file_uri() . '/assets/images/diving_category/noimage.jpg';
                }
            ?>
                <li class="categories-with-whale__item js-category-button" data-target="<?php echo esc_attr($term_id); ?>">
                  <div class="categories-with-whale__icon u-desktop">
                    <img src="<?php echo esc_url($term_icon_url); ?>" alt="魚のアイコン" />
                  </div>
                  <?php echo esc_html($term_name); ?>
                </li>
            <?php
              }
            }
            ?>
          </ul>
        </div>

        <!-- Containers -->
        <ul class="page-information__containers">
          <?php
          if ($terms) {
            foreach ($terms as $term) {
              $term_id = $term->term_id;
              $term_name = $term->name;
              $term_slug = $term->slug;
              $term_description = $term->description;
              // 画像のファイル名
              $term_image = 'image_' . $term_slug . '.jpg';
              $term_image_url = get_theme_file_uri() . '/assets/images/diving_category/' . $term_image;
              $term_image_path = get_theme_file_path() . '/assets/images/diving_category/' . $term_image;
              if (file_exists($term_image_path)) {
                $term_image_url = get_theme_file_uri() . '/assets/images/diving_category/' . $term_image;
              } else {
                $term_image_url = get_theme_file_uri() . '/assets/images/diving_category/noimage.jpg';
              }
          ?>
              <li class="page-information__container js-category-content" id="<?php echo esc_attr($term_id); ?>">
                <div class="page-information__text-box">
                  <h2 class="page-information__title"><?php echo esc_html($term_name); ?></h2>
                  <p class="page-information__text"><?php echo esc_html($term_description); ?></p>
                </div>
                <figure class="page-information__photo">
                  <img src="<?php echo esc_url($term_image_url); ?>" alt="カテゴリーのイメージ写真" />
                </figure>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>