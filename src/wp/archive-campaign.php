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
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- Campaign -->
  <div class="page-campaign page-top treatment">
    <div class="page-campaign__inner inner">
      <!-- Categories -->
      <div class="page-campaign__categories categories">
        <ul class="categories__items">
          <?php
          $class1 = 'categories__item';
          $class2 = 'categories__link';
          // カスタム投稿一覧ページのリンク
          $custom_post_type = 'campaign'; // カスタム投稿タイプ名
          if (is_post_type_archive($custom_post_type)) :
            $add_class1 = $class1 . ' is-active';
            $add_tag = '<div class="' . $class2 . '">ALL</div>';
          else :
            $add_class1 = $class1;
            $add_link = esc_url(home_url('/' . $custom_post_type));
            $add_tag = '<a href="' . $add_link . '" class="' . $class2 . '" title="View all posts">ALL</a>';
          endif;
          $home_link = '<li class="' . $add_class1 . '">' . $add_tag . '</li>';
          echo $home_link;
          ?>
          <?php
          // タクソノミーのリンク
          $taxonomy = 'campaign_category'; // タクソノミー名
          $current_term_id = get_queried_object_id();
          $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'ID',
            'order'   => 'ASC',
            'number'  => 5
          ));
          if ($terms) :
            foreach ($terms as $term) :
              $term_name = esc_html($term->name);
              if ($current_term_id === $term->term_id) :
                $add_class1 = $class1 . ' is-active';
                $add_tag = '<div class="' . $class2 . '">' . $term_name . '</div>';
              else :
                $add_class1 = $class1;
                // $add_link = esc_url(get_category_link($term->term_id)), // カテゴリーページの場合
                $add_link = esc_url(get_term_link($term, $taxonomy)); // タクソノミーページの場合
                $add_tag = '<a href="' . $add_link . '" class="' . $class2 . '" title="View posts in ' . $term_name . '">' . $term_name . '</a>';
              endif;
              $term_link = '<li class="' . $add_class1 . '">' . $add_tag . '</li>';
              echo $term_link;
            endforeach;
          endif;
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
              <?php
              // カスタムフィールドの金額を取得
              $price_before = get_field('acf_parice_before');
              if ($price_before !== "") {
                $price_before = esc_html('¥' . number_format(get_field('acf_parice_before')));
              }
              $price_after = esc_html('¥' . number_format(get_field('acf_parice_after')));
              // カスタムフィールドのメッセージと日時を取得
              $campaign_message = get_field('acf_campaign_message');
              $campaign_date_from = get_field('acf_date_from');
              $campaign_date_to = get_field('acf_date_to');
              // カスタムフィールド値の整形
              $standardDateFrom = date("c", strtotime($campaign_date_from));
              $standardDateTo = date("c", strtotime($campaign_date_to));
              $formattedDateFrom = date("Y/n/j", strtotime($campaign_date_from));
              $formattedDateTo = date("n/j", strtotime($campaign_date_to));
              ?>
              <?php
              // タクソノミーを表示
              $taxonomy = 'campaign_category';
              $terms = get_the_terms($post_id, $taxonomy);
              ?>
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
  </div>

  <?php get_footer(); ?>