<ul class="page-blog__cards cards01 cards01--c2">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <li class="cards01__card">
        <?php get_template_part("/parts/card/p-card-blog") ?>
      </li>
    <?php endwhile; ?>
  <?php else : ?>
    <li>記事が投稿されていません</li>
  <?php endif; ?>
</ul>

<!-- Pagination -->
<div class="page-blog__pagination">
  <?php wp_pagenavi(); ?>
</div>