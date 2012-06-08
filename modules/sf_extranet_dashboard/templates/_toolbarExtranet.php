<<?php echo html5Tag('nav'); ?> class="nav">
  <ul class="w-menu menu-custom">
    <li>
      <strong class="element"><?php echo __('Extranet') ?></strong>
    </li>
    <li>
      <?php echo link_to(
        __('Dashboard'),
        '@sf_extranet_dashboard',
        'class=element'
      ) ?>
    </li>
    <li>
      <?php echo link_to(
        __('Documents'),
        '@sf_extranet_document',
        'class=element'
      ) ?>
    </li>
    <li>
      <?php echo link_to(
        __('Events'),
        '@sf_extranet_event',
        'class=element'
      ) ?>
    </li>
  </ul>

  <?php include_partial('sfPlopCMS/toolbar_quick_links') ?>
</<?php echo html5Tag('nav'); ?>>