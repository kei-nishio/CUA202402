<?php get_header(); ?>
<main>

  <!-- Breadcrumb -->
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- site map -->
  <div class="page-404">
    <div class="page-404__inner inner">
      <div class="page-404__body">
        <h2 class="page-404__title">404</h2>
        <div class="page-404__text">
          申し訳ありません。
          <br />
          お探しのページが見つかりません。
        </div>
        <div class="page-404__button">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="button button--white">
            <p>page TOP</p>
            <div class="button__arrow arrow"></div>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>