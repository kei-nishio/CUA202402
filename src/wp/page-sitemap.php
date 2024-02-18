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
          <ul class="navigation__items">
            <li class="navigation__item">
              <a href="./campaign.html">キャンペーン</a>
              <ul class="navigation__sub-items">
                <li class="navigation__sub-item"><a href="./campaign.html">ライセンス取得</a></li>
                <li class="navigation__sub-item"><a href="./campaign.html">貸切体験ダイビング</a></li>
                <li class="navigation__sub-item"><a href="./campaign.html">ナイトダイビング</a></li>
              </ul>
            </li>
            <li class="navigation__item"><a href="./about-us.html">私たちについて</a></li>
          </ul>

          <ul class="navigation__items">
            <li class="navigation__item">
              <a href="./information.html">ダイビング情報</a>
              <ul class="navigation__sub-items">
                <li class="navigation__sub-item"><a href="./information.html?id=444">ライセンス講習</a></li>
                <li class="navigation__sub-item"><a href="./information.html?id=555">体験ダイビング</a></li>
                <li class="navigation__sub-item"><a href="./information.html?id=666">ファンダイビング</a></li>
              </ul>
            </li>
            <li class="navigation__item">
              <a href="./blog.html">ブログ</a>
            </li>
          </ul>

          <ul class="navigation__items">
            <li class="navigation__item">
              <a href="./voice.html">お客様の声</a>
            </li>
            <li class="navigation__item">
              <a href="./price.html">料金一覧</a>
              <ul class="navigation__sub-items">
                <li class="navigation__sub-item"><a href="./price.html#price01">ライセンス講習</a></li>
                <li class="navigation__sub-item"><a href="./price.html#price02">体験ダイビング</a></li>
                <li class="navigation__sub-item"><a href="./price.html#price03">ファンダイビング</a></li>
              </ul>
            </li>
          </ul>

          <ul class="navigation__items">
            <li class="navigation__item">
              <a href="./faq.html">よくある質問</a>
            </li>
            <li class="navigation__item">
              <a href="./privacy-policy.html">
                プライバシー
                <br class="u-mobile" />
                ポリシー
              </a>
            </li>
            <li class="navigation__item"><a href="./terms-of-service.html">利用規約</a></li>
            <li class="navigation__item"><a href="./site-map.html">サイトマップ</a></li>
            <li class="navigation__item"><a href="./contact.html">お問合わせ</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>