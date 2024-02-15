<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">voice</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-voice-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-voice-sp.webp" alt="海に浮かぶ5人のダイバーをドローンで撮影した様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- Voice -->
  <div class="page-voice page-top treatment">
    <div class="page-voice__inner inner">
      <!-- Categories -->
      <div class="page-voice__categories categories">
        <ul class="categories__items">
          <?php
          // カスタム投稿一覧ページのリンク
          $home_class = (is_post_type_archive('voice')) ? 'is-active' : '';
          $home_link = sprintf(
            '<li class="categories__item %s"><a href="%s" class="categories__link" title="%s">%s</a></li>',
            $home_class,
            esc_url(home_url('/voice')),
            esc_attr(__('View all posts', 'textdomain')),
            esc_html('ALL')
          );
          echo sprintf(esc_html__('%s', 'textdomain'), $home_link);

          // タクソノミーのリンク
          $taxonomy = 'voice_category';
          $current_term_id = get_queried_object_id();
          $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'ID',
            'order'   => 'ASC',
            'number'  => 5
          ));
          if ($terms) {
            foreach ($terms as $term) {
              $term_class = ($current_term_id === $term->term_id) ? 'is-active' : '';
              $term_link = sprintf(
                '<li class="categories__item %s"><a href="%s" class="categories__link" title="%s">%s</a></li>',
                $term_class,
                // esc_url(get_category_link($term->term_id)), // カテゴリーページの場合
                esc_url(get_term_link($term, $taxonomy)), //  タクソノミーページの場合
                esc_attr(sprintf(__('View posts in %s', 'textdomain'), $term->name)),
                esc_html($term->name)
              );
              echo sprintf(esc_html__('%s', 'textdomain'), $term_link);
            }
          }
          ?>
        </ul>
      </div>

      <!-- Cards -->
      <ul class="page-voice__cards cards02 cards02--c2">
        <li class="cards02__card">
          <div class="card-voice">
            <a href="./voice.html" class="card-voice__link">
              <div class="card-voice__body">
                <div class="card-voice__flex">
                  <div class="card-voice__heading">
                    <div class="card-voice__meta">
                      <p class="card-voice__information">20代&#040;女性&#041;</p>
                      <span class="card-voice__category category-diving">ライセンス講習</span>
                    </div>
                    <h3 class="card-voice__title">ここにタイトルが入ります。ここにタイトル</h3>
                  </div>
                  <figure class="card-voice__image js-colorbox">
                    <img src="./assets/images/voice-card/voice-card01.webp" alt="麦わら帽子と白いTシャツの笑顔の女性" />
                  </figure>
                </div>
                <div class="card-voice__content">
                  <p class="card-voice__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards02__card">
          <div class="card-voice">
            <a href="./voice.html" class="card-voice__link">
              <div class="card-voice__body">
                <div class="card-voice__flex">
                  <div class="card-voice__heading">
                    <div class="card-voice__meta">
                      <p class="card-voice__information">30代&#040;男性&#041;</p>
                      <span class="card-voice__category category-diving">ファンダイビング</span>
                    </div>
                    <h3 class="card-voice__title">ここにタイトルが入ります。ここにタイトル</h3>
                  </div>
                  <figure class="card-voice__image js-colorbox">
                    <img src="./assets/images/voice-card/voice-card02.webp" alt="サムズアップした紺色Yシャツの男性" />
                  </figure>
                </div>
                <div class="card-voice__content">
                  <p class="card-voice__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards02__card">
          <div class="card-voice">
            <a href="./voice.html" class="card-voice__link">
              <div class="card-voice__body">
                <div class="card-voice__flex">
                  <div class="card-voice__heading">
                    <div class="card-voice__meta">
                      <p class="card-voice__information">30代&#040;女性&#041;</p>
                      <span class="card-voice__category category-diving">体験ダイビング</span>
                    </div>
                    <h3 class="card-voice__title">ここにタイトルが入ります。ここにタイトル</h3>
                  </div>
                  <figure class="card-voice__image js-colorbox">
                    <img src="./assets/images/voice-card/voice-card03.webp" alt="仲の良さそうな二人のきれいな女性" />
                  </figure>
                </div>
                <div class="card-voice__content">
                  <p class="card-voice__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards02__card">
          <div class="card-voice">
            <a href="./voice.html" class="card-voice__link">
              <div class="card-voice__body">
                <div class="card-voice__flex">
                  <div class="card-voice__heading">
                    <div class="card-voice__meta">
                      <p class="card-voice__information">20代&#040;女性&#041;</p>
                      <span class="card-voice__category category-diving">体験ダイビング</span>
                    </div>
                    <h3 class="card-voice__title">ここにタイトルが入ります。ここにタイトル</h3>
                  </div>
                  <figure class="card-voice__image js-colorbox">
                    <img src="./assets/images/voice-card/voice-card04.webp" alt="藤色の長袖を着て外にいる若い女性" />
                  </figure>
                </div>
                <div class="card-voice__content">
                  <p class="card-voice__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards02__card">
          <div class="card-voice">
            <a href="./voice.html" class="card-voice__link">
              <div class="card-voice__body">
                <div class="card-voice__flex">
                  <div class="card-voice__heading">
                    <div class="card-voice__meta">
                      <p class="card-voice__information">30代&#040;カップル&#041;</p>
                      <span class="card-voice__category category-diving">ファンダイビング</span>
                    </div>
                    <h3 class="card-voice__title">ここにタイトルが入ります。ここにタイトル</h3>
                  </div>
                  <figure class="card-voice__image js-colorbox">
                    <img src="./assets/images/voice-card/voice-card05.webp" alt="黄色いソファに座る仲のいいカップルの様子" />
                  </figure>
                </div>
                <div class="card-voice__content">
                  <p class="card-voice__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards02__card">
          <div class="card-voice">
            <a href="./voice.html" class="card-voice__link">
              <div class="card-voice__body">
                <div class="card-voice__flex">
                  <div class="card-voice__heading">
                    <div class="card-voice__meta">
                      <p class="card-voice__information">20代&#040;女性&#041;</p>
                      <span class="card-voice__category category-diving">ライセンス講習</span>
                    </div>
                    <h3 class="card-voice__title">ここにタイトルが入ります。ここにタイトル</h3>
                  </div>
                  <figure class="card-voice__image js-colorbox">
                    <img src="./assets/images/voice-card/voice-card06.webp" alt="ボーダー柄の服を着た若い女性" />
                  </figure>
                </div>
                <div class="card-voice__content">
                  <p class="card-voice__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
      </ul>

      <!-- Pagination -->
      <div class="page-voice__pagination">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>