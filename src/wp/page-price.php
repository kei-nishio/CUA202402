<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">price</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-price-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-price-sp.webp" alt="水面にダイバーの頭だけが出ている様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- Price -->
  <div class="page-price page-top treatment">
    <div class="page-price__inner inner">
      <!-- Tables -->
      <?php
      $args = array(
        "post_type" => "price_custom", //post通常投稿
        "posts_per_page" => -1, //表示件数（-1で全件）
        "orderby" => "ID", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
        "order" => "DESC", //ACS昇順、DESC降順
      );
      $the_query = new WP_Query($args);
      ?>
      <ul class="page-price__body">
        <?php if ($the_query->have_posts()) : ?>
          <?php $i = 1 ?>
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
              <li class="page-price__container" id="price<?php echo esc_attr($i); ?>">
                <div class="page-price__product-title">
                  <h2 class="page-price__category"><?php the_title(); ?></h2>
                  <div class="page-price__icon">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/ornaments/fish-whale-green.png" alt="緑色のクジラのアイコン" />
                  </div>
                </div>
                <dl class="page-price__product-table">
                  <?php foreach ($fields as $field) : ?>
                    <?php
                    $course = str_replace('|', '<br class="u-mobile" />', $field[$field_course]);
                    $price = $field[$field_price];
                    ?>
                    <?php if ($course && $price) : ?>
                      <dt class="page-price__product-name"><?php echo $course; ?></dt>
                      <dd class="page-price__product-price"><?php echo esc_html('¥' . number_format($price)); ?></dd>
                    <?php else : continue; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </dl>
              </li>
              <?php $i++; ?>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>記事が投稿されていません</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part('/parts/common/p-contact'); ?>
</main>

<?php get_footer(); ?>