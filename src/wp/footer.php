<!-- Footer -->
<?php
if (is_404()) {
  $class = 'footer footer--404';
} elseif (is_page('contact-thank')) {
  $class = 'footer footer--contact-thank';
} else {
  $class = 'footer';
}
?>
<footer class="<?php echo esc_attr($class); ?>">
  <div class="footer__inner inner">
    <div class="footer__body">
      <div class="footer__logo-container">
        <div class="footer__logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg" alt="コードアップス" />
        </div>

        <div class="footer__sns-icons">
          <a href="https://www.facebook.com/" class="footer__sns-icon icon" target="_blank">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sns/facebook.svg" alt="facebookのアイコン" />
          </a>
          <a href="https://www.instagram.com/" class="footer__sns-icon icon" target="_blank">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sns/Instagram.svg" alt="Instagramのアイコン" />
          </a>
        </div>
      </div>

      <div class="footer__nav navigation">
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
  <small class="footer__copy">Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>

  <!-- to top button -->
  <div class="footer__scroll-top-button js-scroll-top-button">
    <div class="button-slide">
      <div class="button-slide__arrow-up arrow arrow--green"></div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>