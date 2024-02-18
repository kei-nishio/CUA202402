<?php get_header(); ?>
<main>
  <!-- Sub view -->
  <section class="sub-view">
    <div class="sub-view__inner">
      <div class="sub-view__body">
        <div class="sub-view__heading">
          <h1 class="sub-view__text">about us</h1>
        </div>

        <picture class="sub-view__image">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-about-us-pc.webp" media="(min-width:768px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/main-view/main-view-about-us-sp.webp" alt="2匹の黄色熱帯魚が浅瀬近くを泳いでいる様子" />
        </picture>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <?php get_template_part('/parts/common/p-breadcrumb'); ?>

  <!-- About us -->
  <div class="page-about-us page-top treatment">
    <div class="page-about-us__inner inner">
      <!-- Dive into the Ocean -->
      <div class="page-about-us__body">
        <div class="page-about-us__heading">
          Dive into
          <br />
          the Ocean
        </div>
        <p class="page-about-us__text">
          ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
          <br />
          ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
        </p>
      </div>
    </div>
  </div>

  <!-- Gallery -->
  <section class="gallery page-gallery treatment">
    <div class="gallery__inner inner">
      <div class="gallery__title section-title">
        <div class="section-title__en">gallery</div>
        <h2 class="section-title__ja">フォト</h2>
      </div>

      <!-- photos -->
      <ul class="gallery__items">
        <?php
        $post_id = 'gallery-options';
        $field_group = 'scf_gallery_image_group';
        $field_item = 'scfgalleryimage';
        $fields = SCF::get_option_meta($post_id, $field_group);
        ?>
        <?php foreach ($fields as $field) : ?>
          <?php
          $img_id = $field[$field_item];
          $image_url = wp_get_attachment_image_url($img_id, 'full');
          $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
          ?>
          <?php if (!empty($image_url)) : ?>
            <li class="gallery__item">
              <p class="gallery__photo js-modal-open">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
              </p>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>

      <!-- modal -->
      <div class="gallery__modal modal js-modal js-modal-close">
        <div class="modal__body">
          <p class="modal__photo js-modal-imgBox">
            <!-- <img class="modal__img js-modal-img" src="" alt="" /> -->
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <?php get_template_part('/parts/common/p-contact'); ?>
</main>
<?php get_footer(); ?>