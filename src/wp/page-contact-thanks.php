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

  <!-- Thanks -->
  <div class="page-thanks page-top treatment">
    <div class="page-thanks__inner inner">
      <div class="page-thanks__body">
        <p class="page-thanks__title">お問い合わせ内容を送信完了しました。</p>
        <p class="page-thanks__text">
          このたびは、お問い合わせ頂き
          <br class="u-mobile" />
          誠にありがとうございます。
          <br />
          お送り頂きました内容を確認の上、
          <br class="u-mobile" />
          3営業日以内に折り返しご連絡させて頂きます。
          <br />
          また、ご記入頂いたメールアドレスへ、
          <br class="u-mobile" />
          自動返信の確認メールをお送りしております。
        </p>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>