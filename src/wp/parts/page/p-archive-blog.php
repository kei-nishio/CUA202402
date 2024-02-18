<ul class="page-blog__cards cards01 cards01--c2">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <li class="cards01__card">
        <?php get_template_part('/parts/card/p-card-blog') ?>
      </li>
    <?php endwhile; ?>
  <?php else : ?>
    <li>記事が投稿されていません</li>
  <?php endif; ?>
</ul>

<!-- Pagination -->
<div class="page-blog__pagination">
  <?php // wp_pagenavi(); 
  ?>
  <?php
  if (wp_is_mobile()) {
    $mid_size = 1;
  } else {
    $mid_size = 2;
  }
  $args = array(
    'prev_text' => '<span></span>',
    'next_text' => '<span></span>',
    'mid_size' => $mid_size, // 現在ページの左右に表示するページ番号の数
    'end_size' => 0, // 末尾のページ番号リンクの数
  );
  the_posts_pagination($args);
  ?>
</div>