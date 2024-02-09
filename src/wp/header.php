<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"><!-- for IE -->
  <?php if (is_404()) : ?>
    <meta http-equiv="refresh" content=" 3; url=<?php echo esc_url(home_url('/')); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- Header -->
  <header class="header">
    <div class="header__inner">
      <!-- logo -->
      <h1 class="header__logo">
        <a href="./" class="header__logo-link">
          <img src="./assets/images/common/logo.svg" alt="コードアップス" />
        </a>
      </h1>

      <!-- navigation -->
      <div class="header__pc-nav pc-nav u-desktop">
        <ul class="pc-nav__items">
          <li class="pc-nav__item">
            <a href="./campaign.html" class="pc-nav__link">
              <div class="pc-nav__main-text">campaign</div>
              <div class="pc-nav__sub-text">キャンペーン</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./about-us.html" class="pc-nav__link">
              <div class="pc-nav__main-text">about us</div>
              <div class="pc-nav__sub-text">私たちについて</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./information.html" class="pc-nav__link">
              <div class="pc-nav__main-text">information</div>
              <div class="pc-nav__sub-text">ダイビング情報</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./blog.html" class="pc-nav__link">
              <div class="pc-nav__main-text">blog</div>
              <div class="pc-nav__sub-text">ブログ</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./voice.html" class="pc-nav__link">
              <div class="pc-nav__main-text">voice</div>
              <div class="pc-nav__sub-text">お客様の声</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./price.html" class="pc-nav__link">
              <div class="pc-nav__main-text">price</div>
              <div class="pc-nav__sub-text">料金一覧</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./faq.html" class="pc-nav__link">
              <div class="pc-nav__main-text pc-nav__main-text--large">faq</div>
              <div class="pc-nav__sub-text">よくある質問</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="./contact.html" class="pc-nav__link">
              <div class="pc-nav__main-text">contact</div>
              <div class="pc-nav__sub-text">お問合せ</div>
            </a>
          </li>
        </ul>
      </div>

      <!-- hamburger -->
      <div class="header__hamburger hamburger u-mobile js-hamburger">
        <span class="hamburger__border"></span>
        <span class="hamburger__border"></span>
        <span class="hamburger__border"></span>
      </div>

      <!-- drawer -->
      <div class="header__drawer u-mobile js-drawer-menu">
        <div class="header__drawer-mask"></div>
        <div class="header__drawer-inner">
          <div class="header__sp-nav navigation">
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
              <li class="navigation__item"><a href="./blog.html">ブログ</a></li>
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
                  <br />
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
  </header>