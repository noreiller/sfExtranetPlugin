<?php slot('sf_plop_theme', sfPlop::getAdminTheme($sf_user->getProfile()->getTheme(), true, true)) ?>

<?php slot('sf_plop_admin'); ?>
  <?php include_partial('sf_extranet_dashboard/toolbarExtranet') ?>
<?php end_slot(); ?>

<h1><?php echo __('Dashboard') ?></h1>

<div class="section ml">
	<div class="w-block">
		<h2><?php echo __('Events') ?></h2>
		<?php if (count($events) > 0): ?>
			<?php foreach ($events as $item): ?>
				<div class="w-row">
					<h3>
						<strong><?php echo $item->getTitle() ?></strong>
						<?php if ($item->getDate()): ?>
							<span>- <?php echo format_date($item->getDate(), 'EEEE dd MMMM yyyy') ?></span>
						<?php endif; ?>
					</h3>
					<div><?php echo $item->getDescription() ?></div>
					<p><em><?php echo __('Published by %u on %d', array(
						'%u' => $item->getAuthor(),
						'%d' => format_date($item->getUpdatedAt(), 'EEEE dd MMMM yyyy')
					)) ?></em></p>
				</div>
			<? endforeach; ?>
			<div class="w-row">
				<?php echo link_to(__('See all'), '@sf_extranet_event') ?>
			</div>
		<?php else: ?>
			<p><?php echo __('No event yet !') ?></p>
		<?php endif; ?>
	</div>
</div>

<div class="section mr">
	<div class="w-block">
		<h2><?php echo __('Documents') ?></h2>
		<?php include_partial('filter_categories', array(
			'categories' => $categories,
			'category' => $category
		)) ?>
		<?php if (count($documents) > 0): ?>
			<?php foreach ($documents as $item): ?>
				<div class="w-row">
					<h3>
						<strong><?php echo $item->getTitle() ?></strong>
						<span>- <?php echo $item->getCategory() ?></span>
					</h3>
					<p><?php echo link_to(
						$item->getDownloadFileName(), 
						'@sf_extranet_download?id=' . $item->getId(), 
						array('class' => 'download')
					) ?></p>
					<p><em><?php echo __('Published by %u on %d', array(
						'%u' => $item->getAuthor(),
						'%d' => format_date($item->getUpdatedAt(), 'EEEE dd MMMM yyyy')
					)) ?></em></p>
				</div>
			<? endforeach; ?>
			<div class="w-row">
				<?php echo link_to(__('See all'), '@sf_extranet_document') ?>
			</div>
		<?php else: ?>
			<p><?php echo __('No document yet !') ?></p>
		<?php endif; ?>
	</div>
</div>