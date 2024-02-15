<?php
if (is_404()) {
  $class = 'breadcrumb breadcrumb--404';
} else {
  $class = 'breadcrumb';
}
?>
<?php if (function_exists('bcn_display')) { ?>
  <div class="<?php echo esc_attr($class); ?>" vocab="http://schema.org/" typeof="BreadcrumbList">
    <div class="breadcrumb__inner inner">
      <div class="breadcrumb__container">
        <?php bcn_display(); ?>
      </div>
    </div>
  </div>
<?php } ?>