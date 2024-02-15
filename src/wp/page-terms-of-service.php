<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text sub-view__text--capitalize">
            terms
            <span>of</span>
            service
          </h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-others-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-others-sp.webp" alt="サンゴ礁の海を泳ぐオレンジ色の魚の群れの様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part("/parts/common/p-breadcrumb"); ?>

  <!-- site map -->
  <div class="page-terms-of-service page-top treatment">
    <div class="page-terms-of-service__inner inner">
      <h2 class="page-terms-of-service__title"><?php the_title(); ?></h2>
      <div class="page-terms-of-service__body">
        <?php the_content(); ?>
        <p>以下は、Webサイトで使用する一般的な利用規約の例です。</p>
        <ul>
          <li>
            概要
            この利用規約は、当社が提供するサービスの利用に関する条件を定めたものです。本規約に同意いただくことで、当社のサービスを利用いただけます。なお、本規約に違反した場合、当社はサービスの提供を中止することがあります。
          </li>
          <li>
            サービスの利用
            当社のサービスは、お客様が自己責任において利用するものとし、当社はその利用に対して責任を負いません。また、当社はいつでも、サービスの提供を中止することができるものとします。
          </li>
          <li>禁止事項 お客様は、以下の行為を禁止します。</li>
        </ul>
        <p>
          ・当社のサービスに対して不正なアクセスをすること
          ・当社のサービスにおいて、他のユーザーに対して迷惑をかける行為をすること
          ・当社のサービスを商業目的で利用すること ・当社のサービスに関する知的財産権を侵害する行為をすること
          ・その他、法律や公序良俗に反する行為をすること
        </p>
        <ul>
          <li>
            知的財産権
            当社のサービスに関する知的財産権は、当社または当社にライセンスを許諾している者に帰属します。お客様は、当社の事前の承諾なしに、当社のサービスに関する知的財産権を使用することはできません。
          </li>
          <li>
            免責事項
            当社は、当社のサービスに関連して発生した損害について、一切の責任を負わないものとします。また、当社は、当社のサービスにより提供される情報の正確性、信頼性、完全性、適時性についても一切保証しません。
          </li>
          <li>
            プライバシー
            当社は、お客様の個人情報を適切に保護するために、個人情報保護方針に従って適切な取扱いを行います。
          </li>
          <li>
            その他の規定
            本規約は、日本法に準拠して解釈されるものとし、当社とお客様は、本規約に関する紛争が生じた場合、東京地方裁判所を第一審の専属的合意管轄裁判所とすることに同意します。
          </li>
          <li>
            利用規約の変更
            当社は、必要に応じて本利用規約を変更することがあります。変更後の利用規約は、当社のサイトに掲載された時点から効力を有するものとします。変更があった場合、当社は適切な手段でお知らせします。
          </li>
        </ul>
        <p>
          以上が、当社の利用規約の概要です。お客様のサービス利用にあたっては、本規約をお読みいただき、同意いただける場合のみサービスをご利用ください。
        </p>
      </div>
    </div>
  </div>
  </div>

  <!-- Contact -->
  <?php get_template_part("/parts/common/p-contact"); ?>
</main>
<?php get_footer(); ?>