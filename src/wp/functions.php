<?php

// ! 投稿画面の表示項目を設定する
add_action('after_setup_theme', 'my_setup');
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // titleタグ自動生成
  add_theme_support('html5', array( // HTML5による出力
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
}

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

// ! カスタム投稿の表示件数を設定する
add_action('pre_get_posts', 'change_posts_per_page');
function change_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query())
    return;
  if ($query->is_archive('works')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '6'); //表示件数を指定（-1は全件）
  }
}

// ! Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}
