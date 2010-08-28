// main.js

function table_toggle_selected(event) {
	$(this).closest('tr')
		.toggleClass('selected', $(this).attr('checked'));
}

$(document).ready(function() {
	$('table td input[type="checkbox"]')
		.click(table_toggle_selected)
		.each(table_toggle_selected);
});
