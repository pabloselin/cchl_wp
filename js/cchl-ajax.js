jQuery(document).ready(function($) {
	// Javascript para consultas ajax
	var dias = $('ul.diasfilsa li a.daysel');
	var container = $('.eventos-load');
	
	dias.on('click', function() {
		dias.removeClass('active');
		$(this).addClass('active');
		var dia = $(this).data('day');
		container.empty().append('<div class="eventos-loading"><p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando eventos ...</p></div>');
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

	var filtroselect = $('select#todos-eventos-tipos-ajax, select#todos-eventos-temas-ajax');
	var containerfiltro = $('div.evtodos-load');

	filtroselect.on('change', function() {
		var tax = $(this).data('filter');
		var selected = $('option:selected', this);
		var term = selected.attr('value');

		containerfiltro.empty().append('<div class="eventos-loading"><p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando eventos ...</p></div>');
		$.ajax({
			type: 'POST',
			url: cchl.ajaxurl,
			data: {
				'action': 'cchl_eventfilterquery',
				'eventtax': tax,
				'eventterm': term,
				'eventcat': 180
			}
		}).done(function(data) {
			containerfiltro.empty().append(data);
		});
	});

	$('.ferias-normales').masonry({
    itemSelector: '.feria-normal',
    columnWidth: 300
});
});