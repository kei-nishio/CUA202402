<?php
$post_id = get_the_ID(); // 投稿の ID を指定
$thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
?>
<div class="card-blog">
  <a href="<?php the_permalink(); ?>" class="card-blog__link">
    <figure class="card-blog__image">
      <?php if (has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
      <?php else : ?>
        <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
      <?php endif; ?>
    </figure>
    <div class="card-blog__body">
      <time class="card-blog__date" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>
      <h3 class="card-blog__title"><?php echo esc_html(mb_strimwidth(get_the_title(), 0, 18 * 2 + 3, '...')); ?></h3>
      <div class="card-blog__content">
        <p class="card-blog__text"><?php echo esc_html(mb_strimwidth(strip_tags(get_the_content()), 0, 100 * 2, '')); ?></p>
      </div>
    </div>
  </a>
</div>