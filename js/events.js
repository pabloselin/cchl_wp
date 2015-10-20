jQuery(document).ready(function($) {
	// Javascript para consultas ajax
	var dias = $('ul.diasfilsa li a.daysel');
	var container = $('.eventos-load');
	dias.on('click', function() {
		var dia = $(this).data('day');
		container.empty().append('<p>Cargando...</p>');
		$.ajax({
			type: 'POST',
			url: cchl.ajaxurl,
			data: {
				'action': 'cchl_eventdayquery',
				'day': dia,
				'eventcat': 180
			}
		}).done(function(data) {
			container.empty().append(data);
			cchl_enableFilters(container);
		});
	});
});