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
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg" alt="コードアップス" />
        </a>
      </h1>

      <!-- navigation -->
      <div class="header__pc-nav pc-nav u-desktop">
        <ul class="pc-nav__items">
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text">campaign</div>
              <div class="pc-nav__sub-text">キャンペーン</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text">about us</div>
              <div class="pc-nav__sub-text">私たちについて</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/information')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text">information</div>
              <div class="pc-nav__sub-text">ダイビング情報</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text">blog</div>
              <div class="pc-nav__sub-text">ブログ</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/voice')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text">voice</div>
              <div class="pc-nav__sub-text">お客様の声</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/price')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text">price</div>
              <div class="pc-nav__sub-text">料金一覧</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/faq')); ?>" class="pc-nav__link">
              <div class="pc-nav__main-text pc-nav__main-text--large">faq</div>
              <div class="pc-nav__sub-text">よくある質問</div>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="pc-nav__link">
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
          <?php get_template_part("/parts/common/p-navigation") ?>
          </div>
        </div>
      </div>
    </div>
  </header>