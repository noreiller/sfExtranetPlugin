<?php slot('sf_plop_theme', sfPlop::getAdminTheme($sf_user->getProfile()->getTheme(), true, true)) ?>

<?php slot('sf_plop_admin'); ?>
  <?php include_partial('sf_extranet_dashboard/toolbarExtranet') ?>
<?php end_slot(); ?>

<div id="sf_admin_bar">
	
	<div class="section lcr">
		<div class="w-block">
			<h3><?php echo __('Download the file') ?></h3>
			<p><?php echo link_to(
				$form->getObject()->getFile(), 
				'@sf_extranet_download?id=' . $form->getObject()->getId(),
				array('class' => 'download')
			) ?></p>
		</div>
	</div>

	<div class="section lcr">
		<div class="w-block">
			<h3><?php echo __('Informations') ?></h3>
			<p><?php echo __('Created by : %s', array('%s' => $form->getObject()->getAuthor())) ?></p>
		</div>
	</div>

</div>