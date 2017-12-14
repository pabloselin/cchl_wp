//Main ajax functions
jQuery(document).ready(function($) {
	
	$.fn.extend({
		animateCss: function (animationName) {
			var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			this.addClass('animated ' + animationName).one(animationEnd, function() {
				$(this).removeClass('animated ' + animationName);
			});
		}
	});
	
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
	
	catitems.imagesLoaded().progress( function() {
		catitems.masonry('layout');
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
	
	Galleria.loadTheme( cchl.templateurl + '/js/extras/galleria.classic.js');
	
	if(Galleria && galleryCont.length > 0 ) {
		
		
		if(galleryCont) {
			
			Galleria.run('.gallery');
			
		}
		
		
	}
	
	if($('body').hasClass('page-template-bs-listado-socios') || $('body').hasClass('post-type-archive-socios')) {
		//console.log(existingletters);
		for(var i = 0; i < existingletters.length; i++) {
			$('.btn-group.nav-socios-list').append('<button class="btn btn-default">' + existingletters[i] + '</button>');
		}
		
		$('.btn-group.nav-socios-list .btn').on('click', function() {
			var thisitem = $(this);
			var thisletter = thisitem.text();
			var others = $('.btn-group.nav-socios-list .btn');
			
			if(thisitem.hasClass('btn-primary')) {
				$('.listado-socios .item-socio').show();
				thisitem.removeClass('btn-primary');
				thisitem.addClass('btn-default');
			} else {
				$('.listado-socios .item-socio').hide();
				$('.listado-socios .item-socio[data-letter=' + thisletter + ']').show();
				thisitem.removeClass('btn-default');
				others.removeClass('btn-primary').addClass('btn-default');
				thisitem.addClass('btn-primary');
			}
		});
	}
	
});
