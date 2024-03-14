<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text"><span class="sub-view__text--uppercase">faq</span></h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-faq-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-faq-sp.webp" alt="白い砂浜と透き通ったエメラルドグリーンの海の様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- Faq -->
  <?php
  $field_slug = 'faq-options';
  $field_group = 'scf_faq_group';
  $field_question = 'scfquestion';
  $field_answer = 'scfanswer';
  $fields = SCF::get_option_meta($field_slug, $field_group);
  ?>
  <?php
  // フィールド値が全て空の場合はギャラリーセクションを表示しない
  $result_not_empty = false;
  foreach ($fields as $field) :
    if ($field[$field_question] === "") :
      // フィールドの登録がない場合は、次のループに移る
      continue;
    else :
      // フィールドの登録がある場合は、フラグを立てる
      $result_not_empty = true;
    endif;
  endforeach;
  ?>
  <div class="page-faq page-top treatment">
    <div class="page-faq__inner inner">
      <!-- Accordion -->
      <?php if ($result_not_empty) : ?>
        <ul class="page-faq__items">
          <?php foreach ($fields as $field) : ?>
            <?php if (!empty($field[$field_question]) && !empty($field[$field_answer])) : ?>
              <li class="page-faq__item">
                <dl class="page-faq__qa">
                  <dt class="page-faq__question js-faq-accordion"><?php echo $field[$field_question]; ?></dt>
                  <dd class="page-faq__answer"><?php echo $field[$field_answer]; ?></dd>
                </dl>
              </li>
            <?php endif; ?>
          <?php endforeach;  ?>
        </ul>
      <?php else : ?>
        <p>FAQ一覧がありません</p>
      <?php endif ?>
    </div>
  </div>

  <?php get_footer(); ?>