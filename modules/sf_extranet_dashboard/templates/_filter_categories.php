<form class="w-form w-form-i filter-category">
	<label for="category"><?php echo __('Category') ?></label>
	<select name="category" id="category">
		<option value=""></option>
		<?php foreach ($categories as $cat): ?>
			<option 
				value="<?php echo $cat ?>" 
				<?php if ($cat == $category): ?>
					selected="selected"
				<?php endif; ?>
			>
				<?php echo $cat ?>
			</option>
		<?php endforeach; ?>
	</select>
	<input type="submit" value="<?php echo __('Filter') ?>" />
</form>