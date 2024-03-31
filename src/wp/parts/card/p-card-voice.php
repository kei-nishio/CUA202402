<?php
$post_id = get_the_ID(); // 投稿の ID を指定
$thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
?>
<?php
$taxonomy = 'voice_category';
$terms = get_the_terms($post_id, $taxonomy);
$term = $terms[0]->name;

// カスタムフィールドグループの値を取得
$customer_details = get_field('acf_customer_group');
if ($customer_details) {
  // 'acf_age_gender_group' から 'acf_age' と 'acf_gender' の値を取得
  $age_gender = $customer_details['acf_age_gender_group'];
  if ($age_gender) {
    $age = esc_html($age_gender['acf_age']);
    $gender = esc_html($age_gender['acf_gender']);
  }
  // 'acf_customer_group' から直接取得できるフィールドの値を取得
  $image = $customer_details['acf_customer_image'];
  $customer_voice = esc_html($customer_details['acf_customer_voice']);
}

// タクソノミーと画像URLの取得
$customer_category = esc_html($term);
$image_url = esc_url($image['url']);
$image_alt = esc_attr($image['alt']);
?>
<div class="card-voice">
  <div class="card-voice__body">
    <div class="card-voice__flex">
      <div class="card-voice__heading">
        <div class="card-voice__meta">
          <p class="card-voice__information"><?php echo $age; ?>代(<?php echo $gender; ?>)</p>
          <span class="card-voice__category category-diving"><?php echo $customer_category; ?></span>
        </div>
        <h3 class="card-voice__title"><?php the_title(); ?></h3>
      </div>
      <figure class="card-voice__image js-colorbox">
        <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt ?>" />
      </figure>
    </div>
    <div class="card-voice__content">
      <p class="card-voice__text"><?php echo $customer_voice; ?></p>
    </div>
  </div>
</div>