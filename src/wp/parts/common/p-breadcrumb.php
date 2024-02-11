<?php if (function_exists('bcn_display')) { ?>
  <div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
    <div class="breadcrumb__inner inner">
      <div class="breadcrumb__container">
        <?php bcn_display(); ?>
      </div>
    </div>
  </div>
<?php } ?>