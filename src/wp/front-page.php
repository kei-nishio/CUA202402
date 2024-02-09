<?php get_header(); ?>
<main class="main">
  <!-- Loading -->
  <div class="loading js-load">
    <div class="loading__inner">
      <div class="loading__heading">
        <h2 class="loading__text-large">diving</h2>
        <p class="loading__text-small">into the ocean</p>
      </div>
      <div class="loading__flex">
        <?php
        // ローディング画像の取得
        $image_pc = get_field('acf_fv_image_pc_1');
        $image_sp = get_field('acf_fv_image_sp_1');
        $image_no_image = get_template_directory_uri() . '/assets/images/common/noimage.jpg';
        if ($image_pc) {
          $url_pc = esc_url($image_pc['url']);
          $alt = esc_attr($image_pc['alt']);
        } else {
          $url_pc = $image_no_image;
          $alt = 'ノーイメージ';
        }
        if ($image_sp) {
          $url_sp = esc_url($image_sp['url']);
        } else {
          $url_sp = $image_no_image;
        }
        ?>
        <div class="loading__left">
          <picture class="loading__image js-loading-left">
            <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
            <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
          </picture>
        </div>
        <div class="loading__right">
          <picture class="loading__image js-loading-right">
            <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
            <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
          </picture>
        </div>
      </div>
    </div>
  </div>

  <!-- Main view -->
  <section class="main-view">
    <div class="main-view__inner">
      <div class="main-view__body">
        <div class="main-view__heading">
          <h2 class="main-view__text-large">diving</h2>
          <p class="main-view__text-small">into the ocean</p>
        </div>

        <!-- Main View Swiper -->
        <div class="main-view__swiper js-main-view-swiper">
          <div class="swiper">
            <ul class="swiper-wrapper">
              <?php
              // カスタムフィールドから4つの画像を取得
              for ($i = 1; $i <= 4; $i++) {
                $image_pc = get_field('acf_fv_image_pc_' . $i);
                $image_sp = get_field('acf_fv_image_sp_' . $i);
                $image_no_image = get_template_directory_uri() . '/assets/images/common/noimage.jpg';
                if ($image_pc) {
                  $url_pc = esc_url($image_pc['url']);
                  $alt = esc_attr($image_pc['alt']);
                } else {
                  $url_pc = $image_no_image;
                  $alt = 'ノーイメージ';
                }
                if ($image_sp) {
                  $url_sp = esc_url($image_sp['url']);
                } else {
                  $url_sp = $image_no_image;
                }
              ?>
                <li class="swiper-slide">
                  <picture class="main-view__image">
                    <source srcset="<?php echo  esc_url($image_pc['url']); ?>" media="(min-width:768px)" />
                    <img src="<?php echo  esc_url($image_sp['url']); ?>" alt="<?php echo  esc_attr($image_pc['alt']); ?>" />
                  </picture>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Campaign -->
  <section id="campaign" class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__title section-title">
        <div class="section-title__en">campaign</div>
        <h2 class="section-title__ja">キャンペーン</h2>
      </div>

      <!-- Campaign Swiper -->
      <div class="campaign__swiper js-campaign-swiper">
        <div class="swiper">
          <ul class="swiper-wrapper">
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card01.webp" alt="紺青の海中を黄色く小さな熱帯魚の群れが泳いでいる様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">ライセンス講習</span>
                    <h3 class="card-campaign__title">ライセンス取得</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;56,000</span>
                      <span class="card-campaign__price-after">&#165;46,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card02.webp" alt="透き通った海の砂浜近くに小型ボートが停泊している様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">体験ダイビング</span>
                    <h3 class="card-campaign__title">貸切体験ダイビング</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;24,000</span>
                      <span class="card-campaign__price-after">&#165;18,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card03.webp" alt="夜の海中に漂う幻想的なクラゲの様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">体験ダイビング</span>
                    <h3 class="card-campaign__title">ナイトダイビング</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;10,000</span>
                      <span class="card-campaign__price-after">&#165;8,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card04.webp" alt="ダイビングスーツを着た4人のダイバーが海上にいる様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">ファンダイビング</span>
                    <h3 class="card-campaign__title">貸切ファンダイビング</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;20,000</span>
                      <span class="card-campaign__price-after">&#165;16,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <!-- ! for swiper loop start-->
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card01.webp" alt="紺青の海中を黄色く小さな熱帯魚の群れが泳いでいる様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">ライセンス講習</span>
                    <h3 class="card-campaign__title">ライセンス取得</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;56,000</span>
                      <span class="card-campaign__price-after">&#165;46,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card02.webp" alt="透き通った海の砂浜近くに小型ボートが停泊している様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">体験ダイビング</span>
                    <h3 class="card-campaign__title">貸切体験ダイビング</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;24,000</span>
                      <span class="card-campaign__price-after">&#165;18,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card03.webp" alt="夜の海中に漂う幻想的なクラゲの様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">体験ダイビング</span>
                    <h3 class="card-campaign__title">ナイトダイビング</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;10,000</span>
                      <span class="card-campaign__price-after">&#165;8,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="campaign__card card-campaign">
                <a href="./campaign.html" class="card-campaign__link">
                  <figure class="card-campaign__image">
                    <img src="./assets/images/campaign-card/campaign-card04.webp" alt="ダイビングスーツを着た4人のダイバーが海上にいる様子" />
                  </figure>
                  <div class="card-campaign__meta">
                    <span class="card-campaign__category category-diving">ファンダイビング</span>
                    <h3 class="card-campaign__title">貸切ファンダイビング</h3>
                  </div>
                  <div class="card-campaign__content">
                    <p class="card-campaign__text">全部コミコミ&#040;お一人様&#041;</p>
                    <div class="card-campaign__prices">
                      <span class="card-campaign__price-before">&#165;20,000</span>
                      <span class="card-campaign__price-after">&#165;16,000</span>
                    </div>
                  </div>
                </a>
              </div>
            </li>
            <!-- ! for swiper loop end-->
          </ul>
        </div>
        <div class="swiper-button-prev campaign__swiper-prev">
          <div class="button-slide">
            <div class="button-slide__arrow-left arrow arrow--mirror arrow--green"></div>
          </div>
        </div>
        <div class="swiper-button-next campaign__swiper-next">
          <div class="button-slide">
            <div class="button-slide__arrow-right arrow arrow--green"></div>
          </div>
        </div>
      </div>

      <div class="campaign__button">
        <a href="./campaign.html" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- About us -->
  <section id="about-us" class="about-us top-about-us treatment">
    <div class="about-us__inner inner">
      <div class="about-us__title section-title">
        <div class="section-title__en">about us</div>
        <h2 class="section-title__ja">私たちについて</h2>
      </div>

      <div class="about-us__body">
        <div class="about-us__images-box">
          <div class="about-us__images">
            <div class="about-us__image01">
              <img src="./assets/images/about-us/about-us01.webp" alt="青い空を背景にしてレンガ色の瓦にシーサーがいる様子" />
            </div>
            <div class="about-us__image02">
              <img src="./assets/images/about-us/about-us02.webp" alt="浅瀬の透き通った海中に2匹の黄色い熱帯魚が泳いでいる様子" />
            </div>
          </div>
        </div>
        <div class="about-us__container">
          <div class="about-us__heading">
            Dive into
            <br />
            the Ocean
          </div>
          <div class="about-us__text-box">
            <p class="about-us__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br />
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
            </p>
            <div class="about-us__button">
              <a href="./about-us.html" class="button">
                <p>view more</p>
                <div class="button__arrow arrow"></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Information -->
  <section id="information" class="information top-information">
    <div class="information__inner inner">
      <div class="information__title section-title">
        <div class="section-title__en">information</div>
        <h2 class="section-title__ja">ダイビング情報</h2>
      </div>
      <div class="information__body">
        <div class="information__image-container">
          <figure class="information__image js-colorbox">
            <img src="./assets/images/top/information01.webp" alt="サンゴ礁と黄色い熱帯魚" />
          </figure>
        </div>
        <div class="information__text-box">
          <h3 class="information__sub-title">ライセンス講習</h3>
          <p class="information__text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。
            <br />
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__button">
            <a href="./information.html" class="button">
              <p>view more</p>
              <div class="button__arrow arrow"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <section id="blog" class="blog treatment">
    <div class="blog__inner inner">
      <div class="blog__title section-title section-title--white-pc">
        <div class="section-title__en">blog</div>
        <h2 class="section-title__ja">ブログ</h2>
      </div>

      <ul class="blog__cards cards01 cards01--c3">
        <li class="cards01__card">
          <div class="card-blog">
            <a href="./blog.html" class="card-blog__link">
              <figure class="card-blog__image">
                <img src="./assets/images/blog-card/blog-card01.webp" alt="ピンク色の枝状の珊瑚" />
              </figure>
              <div class="card-blog__body">
                <time class="card-blog__date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="card-blog__title">ライセンス取得</h3>
                <div class="card-blog__content">
                  <p class="card-blog__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards01__card">
          <div class="card-blog">
            <a href="./blog.html" class="card-blog__link">
              <figure class="card-blog__image">
                <img src="./assets/images/blog-card/blog-card02.webp" alt="ウミガメが海中を泳いでこちらに向かってきている様子" />
              </figure>
              <div class="card-blog__body">
                <time class="card-blog__date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="card-blog__title">ウミガメと泳ぐ</h3>
                <div class="card-blog__content">
                  <p class="card-blog__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li class="cards01__card">
          <div class="card-blog">
            <a href="./blog.html" class="card-blog__link">
              <figure class="card-blog__image">
                <img src="./assets/images/blog-card/blog-card03.webp" alt="カクレクマノミが磯巾着の中に隠れている様子" />
              </figure>
              <div class="card-blog__body">
                <time class="card-blog__date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="card-blog__title">カクレクマノミ</h3>
                <div class="card-blog__content">
                  <p class="card-blog__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                  </p>
                </div>
              </div>
            </a>
          </div>
        </li>
      </ul>
      <div class="blog__button">
        <a href="./blog.html" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Voice -->
  <section id="voice" class="voice top-voice treatment">
    <div class="voice__inner inner">
      <div class="voice__title section-title">
        <div class="section-title__en">voice</div>
        <h2 class="section-title__ja">お客様の声</h2>
      </div>

      <ul class="voice__cards cards02 cards02--c2">
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
      </ul>
      <div class="voice__button">
        <a href="./voice.html" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Price -->
  <section id="price" class="price top-price treatment">
    <div class="price__inner inner">
      <div class="voice__title section-title">
        <div class="section-title__en">price</div>
        <h2 class="section-title__ja">料金一覧</h2>
      </div>
      <div class="price__body">
        <figure class="price__image-sp u-mobile js-colorbox">
          <img src="./assets/images/top/price01-sp.webp" alt="海を泳ぐアカウミガメを右側から撮影した写真" />
        </figure>
        <ul class="price__lists">
          <li class="price__list">
            <div class="diving-products">
              <h3 class="diving-products__category">ライセンス講習</h3>
              <dl class="diving-products__list">
                <dt class="diving-products__name">オープンウォーターダイバーコース</dt>
                <dd class="diving-products__price">&#165;50,000</dd>
                <dt class="diving-products__name">アドバンスドオープンウォーターコース</dt>
                <dd class="diving-products__price">&#165;60,000</dd>
                <dt class="diving-products__name">レスキュー＋EFRコース</dt>
                <dd class="diving-products__price">&#165;70,000</dd>
              </dl>
            </div>
          </li>
          <li class="price__list">
            <div class="diving-products">
              <h3 class="diving-products__category">体験ダイビング</h3>
              <dl class="diving-products__list">
                <dt class="diving-products__name">ビーチ体験ダイビング&#040;半日&#041;</dt>
                <dd class="diving-products__price">&#165;7,000</dd>
                <dt class="diving-products__name">ビーチ体験ダイビング&#040;1日&#041;</dt>
                <dd class="diving-products__price">&#165;14,000</dd>
                <dt class="diving-products__name">ボート体験ダイビング&#040;半日&#041;</dt>
                <dd class="diving-products__price">&#165;10,000</dd>
                <dt class="diving-products__name">ボート体験ダイビング&#040;1日&#041;</dt>
                <dd class="diving-products__price">&#165;18,000</dd>
              </dl>
            </div>
          </li>
          <li class="price__list">
            <div class="diving-products">
              <h3 class="diving-products__category">ファンダイビング</h3>
              <dl class="diving-products__list">
                <dt class="diving-products__name">ビーチダイビング&#040;2ダイブ&#041;</dt>
                <dd class="diving-products__price">&#165;14,000</dd>
                <dt class="diving-products__name">ボートダイビング&#040;2ダイブ&#041;</dt>
                <dd class="diving-products__price">&#165;18,000</dd>
                <dt class="diving-products__name">スペシャルダイビング&#040;2ダイブ&#041;</dt>
                <dd class="diving-products__price">&#165;24,000</dd>
                <dt class="diving-products__name">ナイトダイビング&#040;1ダイブ&#041;</dt>
                <dd class="diving-products__price">&#165;10,000</dd>
              </dl>
            </div>
          </li>
          <li class="price__list">
            <div class="diving-products">
              <h3 class="diving-products__category">スペシャルダイビング</h3>
              <dl class="diving-products__list">
                <dt class="diving-products__name">貸切ダイビング&#040;2ダイブ&#041;</dt>
                <dd class="diving-products__price">&#165;24,000</dd>
                <dt class="diving-products__name">1日ダイビング&#040;3ダイブ&#041;</dt>
                <dd class="diving-products__price">&#165;32,000</dd>
              </dl>
            </div>
          </li>
        </ul>
        <figure class="price__image-pc u-desktop js-colorbox">
          <img src="./assets/images/top/price02-pc.webp" alt="サンゴ礁の海を緋色の小魚の群れが泳いでいる様子" />
        </figure>
      </div>
      <div class="price__button">
        <a href="./price.html" class="button">
          <p>view more</p>
          <div class="button__arrow arrow"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="contact top-contact treatment">
    <div class="contact__inner inner">
      <div class="contact__body">
        <div class="contact__access">
          <div class="contact__logo">
            <img src="./assets/images/common/logo-green.svg" alt="コードアップス" />
          </div>
          <div class="contact__flex">
            <address class="contact__store-info">
              <ul>
                <li>沖縄県那覇市1-1</li>
                <li>
                  TEL:
                  <a href="tel:0120-000-0000">0120-000-0000</a>
                </li>
                <li>営業時間:8:30-19:00</li>
                <li>定休日:毎週火曜日</li>
              </ul>
            </address>

            <div class="contact__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.5153396566434!2d127.67573737591492!3d26.21243987707159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5699e88a1f5b9%3A0x754ce0d09feedce9!2z44CSOTAwLTAwMjEg5rKW57iE55yM6YKj6KaH5biC5rOJ5bSO77yR5LiB55uu77yZ4oiS77yR77yZIOaylue4hOecjOW6gQ!5e0!3m2!1sja!2sjp!4v1689072805198!5m2!1sja!2sjp" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__guide">
          <div class="contact__title section-title section-title--large">
            <div class="section-title__en">contact</div>
            <h2 class="section-title__ja">お問合せ</h2>
          </div>
          <p class="contact__text">ご予約・お問合せはコチラ</p>
          <div class="contact__button">
            <a href="./contact.html" class="button">
              <p>contact us</p>
              <div class="button__arrow arrow"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>