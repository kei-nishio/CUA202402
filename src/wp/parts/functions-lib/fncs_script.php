<?php
// ! headでgoogle fontやCDNを読み込む
add_action('wp_enqueue_scripts', 'my_script_init');
function my_script_init()
{
  // jQuery
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', "", "3.6.0", true);

  // Google Fonts
  wp_enqueue_style('NotoSansJP', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400..700&display=swap');
  wp_enqueue_style('Gotu', 'https://fonts.googleapis.com/css2?family=Gotu&display=swap');
  wp_enqueue_style('Lato', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&display=swap');

  // CSS
  wp_enqueue_style('style-swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
  wp_enqueue_style('style-main', get_theme_file_uri('/assets/css/style.css'), array(), '1.0.0');

  // Script
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('jquery'), "10.0", true);
  wp_enqueue_script('inview', get_theme_file_uri('/assets/js/jquery.inview.min.js'), array('jquery', 'swiper'), "10.0", true);
  wp_enqueue_script('script-main', get_theme_file_uri('/assets/js/script.js'), array('jquery', 'swiper', 'inview'), '1.0.0', true);
}
