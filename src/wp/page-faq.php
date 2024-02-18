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

  <!-- Price -->
  <div class="page-faq page-top treatment">
    <div class="page-faq__inner inner">
      <!-- Accordion -->
      <ul class="page-faq__items">
        <?php
        $post_id = 'faq-options';
        $field_group = 'scf_faq_group';
        $field_question = 'scfquestion';
        $field_answer = 'scfanswer';
        $fields = SCF::get_option_meta($post_id, $field_group);
        foreach ($fields as $field) {
          if (!empty($field[$field_question])) {
        ?>
            <li class="page-faq__item">
              <dl class="page-faq__qa">
                <dt class="page-faq__question js-faq-accordion"> <?php echo $field[$field_question]; ?></dt>
                <dd class="page-faq__answer"> <?php echo $field[$field_answer]; ?></dd>
              </dl>
            </li>
        <?php
          }
        }
        ?>
      </ul>
    </div>
  </div>

  <!-- Contact -->
  <?php get_template_part('/parts/common/p-contact'); ?>
</main>
<?php get_footer(); ?>