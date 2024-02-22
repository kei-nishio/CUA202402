<article class="page-blog__article">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php
      $post_id = get_the_ID(); // 投稿の ID を指定
      $thumbnail_id = get_post_thumbnail_id($post_id); // アイキャッチ画像の ID を取得
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // アイキャッチ画像の alt 属性を取得
      ?>
      <time class="page-blog__date" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>
      <h2 class="page-blog__title"><?php the_title(); ?></h2>
      <figure class="page-blog__image">
        <?php if (has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt); ?>">
        <?php else : ?>
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/noimage.jpg")); ?>" alt="ノーイメージ画像" />
        <?php endif; ?>
      </figure>
      <div class="page-blog_content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  <?php else : ?>
    <li>記事が投稿されていません</li>
  <?php endif; ?>
</article>

<!-- Pagination -->
<?php
$prev = get_previous_post();
$next = get_next_post();
if (!empty($prev)) $prev_url = esc_url(get_permalink($prev->ID));
if (!empty($next)) $next_url = esc_url(get_permalink($next->ID));
?>
<div class="page-blog__pagination-single pagination">
  <div class="pagination__body">
    <?php if (!empty($prev)) : ?>
      <a class="pagination__prev" href="<?php echo $prev_url; ?>"><span></span></a>
    <?php endif; ?>
    <?php if (!empty($next)) : ?>
      <a class="pagination__next" href="<?php echo $next_url; ?>"><span></span></a>
    <?php endif; ?>
  </div>
</div>