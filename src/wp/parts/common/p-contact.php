<?php
if (!is_front_page()) {
  $add_class = 'top-contact--page';
} else {
  $add_class = '';
}
?>

<section id="contact" class="contact top-contact <?php echo esc_attr($add_class); ?> treatment">
  <div class="contact__inner inner">
    <div class="contact__body">
      <div class="contact__access">
        <div class="contact__logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-green.svg" alt="コードアップス" />
        </div>
        <div class="contact__flex">
          <address class="contact__store-info">
            <ul>
              <li>沖縄県那覇市1-1</li>
              <li>
                TEL:
                <a href="tel:0120-000-0000">0120-000-0000</a>
              </li>
              <li>営業時間:8:30-19:00</li>
              <li>定休日:毎週火曜日</li>
            </ul>
          </address>

          <div class="contact__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.5153396566434!2d127.67573737591492!3d26.21243987707159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5699e88a1f5b9%3A0x754ce0d09feedce9!2z44CSOTAwLTAwMjEg5rKW57iE55yM6YKj6KaH5biC5rOJ5bSO77yR5LiB55uu77yZ4oiS77yR77yZIOaylue4hOecjOW6gQ!5e0!3m2!1sja!2sjp!4v1689072805198!5m2!1sja!2sjp" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="contact__guide">
        <div class="contact__title section-title section-title--large">
          <div class="section-title__en">contact</div>
          <h2 class="section-title__ja">お問合せ</h2>
        </div>
        <p class="contact__text">ご予約・お問合せはコチラ</p>
        <div class="contact__button">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button">
            <p>contact us</p>
            <div class="button__arrow arrow"></div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>