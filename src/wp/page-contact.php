<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">contact</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-contact-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-contact-sp.webp" alt="エメラルドグリーンの海を空から撮影した様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- Price -->
  <div class="page-contact page-top treatment">
    <div class="page-contact__inner inner">
      <!-- Forms -->
      <div class="page-contact__form">
        <!-- error message -->
        <div class="form__error js-form-error">
          <div>※必須項目が入力されていません。<span class="u-mobile"><br />&emsp;</span>入力してください。</div>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="eb00c44" title="入力画面"]'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>