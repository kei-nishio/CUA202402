<ul class="navigation__items">
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
    <ul class="navigation__sub-items">
      <?php
      $taxonomy = 'campaign_category';
      $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'orderby' => 'ID',
        'order'   => 'ASC',
        'number'  => 5
      ));
      ?>
      <?php if ($terms) : ?>
        <?php foreach ($terms as $term) : ?>
          <?php
          $term_url = esc_url(get_term_link($term, $taxonomy));
          $term_name = esc_html($term->name);
          ?>
          <li class="navigation__sub-item"><a href="<?php echo $term_url; ?>"><?php echo $term_name; ?></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </li>
  <li class="navigation__item"><a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a></li>
</ul>

<ul class="navigation__items">
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
    <?php
    $taxonomy = 'information_category';
    $terms = get_terms(array(
      'taxonomy' => $taxonomy,
      'orderby' => 'ID',
      'order'   => 'ASC',
      'number'  => 0, // 0なら全件取得
    ));
    ?>
    <ul class="navigation__sub-items">
      <?php if ($terms) : ?>
        <?php foreach ($terms as $term) : ?>
          <?php
          $term_id = $term->term_id;
          $term_name = str_replace('|', '', $term->name);
          ?>
          <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/information?id=' . $term_id)); ?>"><?php echo $term_name; ?></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </li>
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
  </li>
</ul>

<ul class="navigation__items">
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
  </li>
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>

    <?php
    $args = array(
      "post_type" => "price_custom", //post通常投稿
      "posts_per_page" => 3, //表示件数（-1で全件）
      "orderby" => "ID", // data投稿日時、titeタイトル、modified最終更新日時、comment_countコメント数
      "order" => "DESC", //ACS昇順、DESC降順
    );
    $the_query = new WP_Query($args);
    ?>
    <ul class="navigation__sub-items">
      <?php if ($the_query->have_posts()) : ?>
        <?php $i = 1 ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php if (get_the_title() !== "") : ?>
            <?php
            // タイトルがある場合のみ処理を続行する
            $post_id = get_the_ID();
            $category_group = 'scf_diving_category_group';
            $result_not_empty = check_fields_not_empty($post_id, $category_group);
            $result_numeric = check_fields_numeric($post_id, $category_group, 'scfdivingcategoryprice');
            $fields = SCF::get($category_group, $post_id);
            // フィールド値に空白がないかつ価格が半角数字の場合のみ処理を続行する
            ?>
            <?php if ($result_not_empty === false || $result_numeric === false) continue; ?>
            <?php if (is_page('price')) : ?>
              <li class="navigation__sub-item"><a href="#price<?php echo esc_attr($i); ?>"><?php the_title(); ?></a></li>
            <?php else : ?>
              <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/price#price' . $i)); ?>"><?php the_title(); ?></a></li>
            <?php endif; ?>
            <?php $i++; ?>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>記事が投稿されていません</li>
      <?php endif; ?>
    </ul>
  </li>
</ul>

<ul class="navigation__items">
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
  </li>
  <li class="navigation__item">
    <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">
      プライバシー
      <br class="u-mobile" />
      ポリシー
    </a>
  </li>
  <li class="navigation__item"><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a></li>
  <li class="navigation__item"><a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a></li>
  <li class="navigation__item"><a href="<?php echo esc_url(home_url('/contact')); ?>">お問合わせ</a></li>
</ul>