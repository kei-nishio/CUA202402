<?php
// ! カスタムページネーションを追加する
/**
 * ページネーションのテンプレートをカスタマイズ
 * @link https://komaricote.com/wordpress/write-pagination/
 * @link https://developer.wordpress.org/reference/functions/the_posts_pagination/
 * 
 */
add_filter('navigation_markup_template', 'custom_pagination');
function custom_pagination($template)
{
  $template = '<div class="custom-pagination">%3$s</div>';
  return $template;
}
