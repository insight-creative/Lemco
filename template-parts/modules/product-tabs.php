<div class="product-tabs">
  <div class="tabs">
  <a data-attr="1" class="tab active" href="#">Description</a>
  <?php if(get_field('tab_2_content')) : ?>
  <a data-attr="2" class="tab" href="#">Downloads</a>
  <?php endif; ?>
  <?php if(get_field('tab_3_content')) : ?>
  <a data-attr="3" class="tab" href="#">Videos</a>
  <?php endif; ?>
</div>
<div class="tab-panels">
  <div class="panel" data-attr="1">
    <?php echo apply_filters('the_content', get_the_content()); ?>
  </div>
  <?php if(get_field('tab_2_content')) : ?>
  <div class="panel" data-attr="2">
    <?php echo get_field('tab_2_content'); ?>
  </div>
  <?php endif; ?>
    <?php if(get_field('tab_3_content')) : ?>
  <div class="panel" data-attr="3">
    <?php echo get_field('tab_3_content'); ?>
  </div>
  <?php endif; ?>
</div>
