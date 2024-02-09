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
// add_action('pre_get_posts', 'change_posts_per_page');
// function change_posts_per_page($query)
// {
//   if (is_admin() || !$query->is_main_query())
//     return;
//   if ($query->is_archive('works')) { //カスタム投稿タイプを指定
//     $query->set('posts_per_page', '6'); //表示件数を指定（-1は全件）
//   }
// }

// ! Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

// ! カスタム投稿タイプのラベルを変更する
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');
function Change_menulabel()
{
  global $menu;
  global $submenu;
  $name = 'ブログ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . '一覧';
  $submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
  global $wp_post_types;
  $name = 'イベント';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new_item = $name . 'の新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_found = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}

// ! 個別記事なし投稿の場合リダイレクトする
add_action('template_redirect', 'custom_redirect_custom_post_types');
function custom_redirect_custom_post_types()
{
  if (is_singular('campaign', 'voice')) {
    wp_redirect(home_url('/'), 302);
    exit;
  }
}
