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
        <?php get_template_part("/parts/common/p-navigation") ?>
      </div>
    </div>
  </div>
  <small class="footer__copy">Copyright &copy; 2023 - <?php the_time("Y"); ?> CodeUps LLC. All Rights Reserved.</small>


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