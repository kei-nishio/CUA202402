<?php
// ! Contact Form 7でセレクトボックスをカスタマイズする
/**
 * @link https://kaminarimagazine.com/web/2019/09/16/contact-form-7%E3%81%A7select%E3%83%9C%E3%83%83%E3%82%AF%E3%82%B9%E3%81%AE%E4%B8%AD%E8%BA%AB%E3%82%92%E5%88%A5%E3%81%AE%E8%A6%81%E7%B4%A0%E3%81%8B%E3%82%89%E8%87%AA%E5%8B%95%E3%81%A7%E8%A8%AD%E5%AE%9A/
 * @link https://minkapi.style/web/post-355/
 * 
 * wpcf7_form_tag_data_option
 * 目的: wpcf7_form_tag_data_option フックは、フォームタグが出力するオプションデータをフィルタリングするために使用されます。具体的には、フォームタグに関連するデータオプション（例えば、ドロップダウンリストの選択肢など）を動的に変更する場合に利用されます。
 * 使用例: このフックを使用して、フォームに含まれる選択肢をユーザーの以前の選択や外部データベースの値に基づいて動的に変更することができます。
 * wpcf7_form_tag
 * 目的: wpcf7_form_tag フックは、フォームタグを生成する際に使用されます。このフックを使うことで、フォームタグのマークアップ自体をカスタマイズしたり、新しいカスタムフォームタグを追加したりすることができます。
 * 使用例: このフックを使用して、カスタムバリデーションメッセージを追加したり、特定のフォームタグに追加のHTML属性を挿入したりすることが可能です。
 * */

add_filter('wpcf7_form_tag_data_option', 'custom_select_values', 10, 3);
function custom_select_values($values, $options, $args)
{
  if (in_array('campaign-select', $options)) {
    if (!is_array($values)) {
      $values = [];
    }
    array_unshift($values, 'キャンペーン内容を選択');

    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'campaign',
      'order' => 'DESC',
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
      while ($the_query->have_posts()) {
        $the_query->the_post();
        $title = get_the_title();
        $values[] = $title;
      }
      wp_reset_postdata();
    }
  }

  return $values;
}
