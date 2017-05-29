jQuery(document).ready(function($) {
	// Javascript para consultas ajax
	var dias = $('ul.diasfilsa li a.daysel');
	var container = $('.eventos-load');


	if( $('span.infoevento') ) {

		var eventcat = $('span.infoevento').data('eventcat');
	
	} else {

		var eventcat = 180;
	}
	
	dias.on('click', function() {
		dias.removeClass('active');
		$(this).addClass('active');
		var dia = $(this).data('day');
		container.empty().append('<div class="eventos-loading"><p><i class="fa fa-cog fa-spin"></i> buscando eventos ...</p></div>');
		$.ajax({
			type: 'POST',
			url: cchl.ajaxurl,
			data: {
				'action': 'cchl_eventdayquery',
				'day': dia,
				'eventcat': eventcat
			}
		}).done(function(data) {
			container.empty().append(data);
			cchl_enableFilters(container);
		});
	});

	var filtroselect = $('select#todos-eventos-tipos-ajax, select#todos-eventos-temas-ajax');
	var containerfiltro = $('div.evtodos-load');

	//console.log('Event:', eventcat);

	filtroselect.on('change', function() {
		var tax = $(this).data('filter');
		var selected = $('option:selected', this);
		var term = selected.attr('value');

		containerfiltro.empty().append('<div class="eventos-loading"><p><i class="fa fa-cog fa-spin"></i> buscando eventos ...</p></div>');
		$.ajax({
			type: 'POST',
			url: cchl.ajaxurl,
			data: {
				'action': 'cchl_eventfilterquery',
				'eventtax': tax,
				'eventterm': term,
				'eventcat': eventcat
			}
		}).done(function(data) {
			containerfiltro.empty().append(data);
		});
	});

	var eventsearchform = $('#searchform-eventos');

	eventsearchform.on('submit', function() {
		
		var $form = $(this);
		var $input = $form.find('input[name="s"]');
		var query = $input.val();
		var $content = $('#eventsearchresults');

		$.ajax({
			type: 'POST',
			url: cchl.ajaxurl,
			data: {
				'action': 'cchl_customeventsearch',
				'query': query
			},
			beforeSend: function() {
				$input.prop('disabled', true);
				$content.empty().append('<div class="eventos-loading"><p><i class="fa fa-cog fa-spin"></i> buscando eventos ...</p></div>').addClass('loading');
			},
			success: function( response ) {
				$input.prop('disabled', false);
				$content.removeClass('loading');
				$content.empty().html( response );
			}
		});

		return false;
	});

	var ferias = $('.ferias-normales').masonry({
   					 	itemSelector: '.feria-normal',
   						columnWidth: 300,
   						gutter: 12
					});

	ferias.imagesLoaded().progress( function() {
		ferias.masonry('layout');
	});

	var catitems = $('.category-items').masonry({
		itemSelector: '.item-mini-noticia',
	});


	var tabContainers = $('div.tabs2 > div');
                tabContainers.hide().filter(':first').show();
                
                $('div.tabs2 ul.tabNavigation a').click(function () {
                    tabContainers.hide();
                    tabContainers.filter(this.hash).show();
                    $('div.tabs2 ul.tabNavigation a').removeClass('selected');
                    $(this).addClass('selected');
                    return false;
                }).filter(':first').click();

	var galleryCont = $('.gallery');
	console.log(galleryCont);

	Galleria.loadTheme( cchl.templateurl + '/js/galleria-classic-theme/galleria.classic.js');

    if(Galleria && galleryCont.length > 0 ) {
    	

    	if(galleryCont) {

    		Galleria.run('.gallery');

    	}

    	
    }

});