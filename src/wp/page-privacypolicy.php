<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text sub-view__text--capitalize">privacy policy</h1>
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
  <div class="page-privacy-policy page-top treatment">
    <div class="page-privacy-policy__inner inner">
      <h2 class="page-privacy-policy__title"><?php the_title(); ?></h2>
      <div class="page-privacy-policy__body">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>