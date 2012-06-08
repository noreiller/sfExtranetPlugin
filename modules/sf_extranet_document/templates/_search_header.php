<?php slot('sf_plop_theme', sfPlop::getAdminTheme($sf_user->getProfile()->getTheme(), true, true)) ?>

<?php slot('sf_plop_admin'); ?>
  <?php include_partial('sf_extranet_dashboard/toolbarExtranet') ?>
<?php end_slot(); ?>

