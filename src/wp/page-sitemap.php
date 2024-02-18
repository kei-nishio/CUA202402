<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">
            site
            <span class="sub-view__text--uppercase">map</span>
          </h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-others-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-others-sp.webp" alt="サンゴ礁の海を泳ぐオレンジ色の魚の群れの様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- site map -->
  <div class="page-site-map page-top treatment">
    <div class="page-site-map__inner inner">
      <div class="page-site-map__body">
        <div class="page-site-map__nav navigation navigation--black">
          <?php get_template_part("/parts/common/p-navigation") ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>