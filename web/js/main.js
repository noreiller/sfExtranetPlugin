jQuery(document).ready(function () {
	if (jQuery('.filter-category').length) {
		jQuery('.filter-category input[type=submit]').hide();
		jQuery('.filter-category select')
			.bind('change', function (event) {
				jQuery(this).parents('form').trigger('submit');
			})
		;
	}
});