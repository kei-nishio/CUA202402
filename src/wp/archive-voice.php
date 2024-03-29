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
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- Voice -->
  <div class="page-voice page-top treatment">
    <div class="page-voice__inner inner">
      <!-- Categories -->
      <div class="page-voice__categories categories">
        <ul class="categories__items">
          <?php
          $class1 = 'categories__item';
          $class2 = 'categories__link';
          // カスタム投稿一覧ページのリンク
          $custom_post_type = 'voice'; // カスタム投稿タイプ名
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
          $taxonomy = 'voice_category'; // タクソノミー名
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
      <ul class="page-voice__cards cards02 cards02--c2">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <li class="cards02__card">
              <?php get_template_part('/parts/card/p-card-voice') ?>
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