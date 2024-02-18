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
      if ($terms) {
        foreach ($terms as $term) {
          $term_url = esc_url(get_term_link($term, $taxonomy));
          $term_name = esc_html($term->name);
      ?>
          <li class="navigation__sub-item"><a href="<?php echo $term_url; ?>"><?php echo $term_name; ?></a></li>
      <?php
        }
      }
      ?>
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
      <?php
      if ($terms) {
        foreach ($terms as $term) {
          $term_id = $term->term_id;
          $term_name = str_replace('|', '<br class="u-mobile" />', $term->name);
      ?>
          <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/information?id=' . $term_id)); ?>"><?php echo $term_name; ?></a></li>
      <?php
        }
      }
      ?>
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
    <ul class="navigation__sub-items">
      <?php
      if (is_page('price')) {
      ?>
        <li class="navigation__sub-item"><a href="#price1">ライセンス講習</a></li>
        <li class="navigation__sub-item"><a href="#price2">体験ダイビング</a></li>
        <li class="navigation__sub-item"><a href="#price3">ファンダイビング</a></li>
        <!-- <li class="navigation__sub-item"><a href="#price4">スペシャルダイビング</a></li> -->
      <?php
      } else {
      ?>
        <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/price#price1')); ?>">ライセンス講習</a></li>
        <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/price#price2')); ?>">体験ダイビング</a></li>
        <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/price#price3')); ?>">ファンダイビング</a></li>
        <!-- <li class="navigation__sub-item"><a href="<?php echo esc_url(home_url('/price#price4')); ?>">スペシャルダイビング</a></li> -->
      <?php
      } ?>
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