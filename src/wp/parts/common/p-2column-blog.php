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
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- blog -->
  <div class="page-blog page-top treatment">
    <div class="page-blog__inner inner">
      <div class="page-blog__body">
        <!-- Left side -->
        <div class="page-blog__left-side">
          <?php
          if (is_home()) {
            get_template_part("/parts/common/p-archive-blog");
          } elseif (is_single()) {
            get_template_part("/parts/common/p-single-blog");
          } else {
            echo "ページが見つかりません";
          }
          ?>
        </div>

        <!-- Right side -->
        <aside class="page-blog__right-side">
          <?php get_template_part("/parts/common/p-sidebar-blog") ?>
        </aside>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>

<?php get_footer(); ?>