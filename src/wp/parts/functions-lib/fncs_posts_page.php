<?php
// ! カスタム投稿の表示件数を設定する
add_action('pre_get_posts', 'change_posts_per_page');
function change_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query())
    return;
  if ($query->is_archive('campaign')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '4'); //表示件数を指定（-1は全件）
  }
}
