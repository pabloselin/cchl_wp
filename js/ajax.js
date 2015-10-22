function cchl_enableFilters(element) {
    /* Activa los filtros para los eventos que se muestran */
    var eventos = jQuery('div.evento', element);
        //reseteo las ocultaciones previas
        eventos.show();

        var avevs = [];
        var evsarr = [];
        //Filtro para tema de evento
        var temevs = [];
        var temsarr = [];
        //Escaneo todos los tipos de eventos disponibles
        eventos.each(function() {
            var evs = jQuery(this).data('cchl_tipoevento');
            var tems = jQuery(this).data('cchl_temaevento');
            if(evs != undefined) {
            evsarr = evs.split(' ');
            //console.log(evsarr);
            for(var i = 0, l = evsarr.length; i < l; i++) {
                if(jQuery.inArray(evsarr[i], avevs) == -1) {
                    avevs.push(evsarr[i]);
                    }
                }
            }
            //Temas
            if(tems != undefined) {
            temsarr = tems.split(' ');
            //console.log(temsarr);
            for(var i = 0, l = temsarr.length; i < l; i++) {
                if(jQuery.inArray(temsarr[i], temevs) == -1) {
                    temevs.push(temsarr[i]);
                    }
                }
            }
        });
        //Construyo menu de navegación
        var filtro = jQuery('div.filtro');
        var filtrotema = jQuery('div.filtrotema');
        //ordeno por nombre
        avevs.sort();
        temevs.sort();
        filtro.empty();
        filtrotema.empty();
        for(var i = 0, l = avevs.length; i < l; i++) {
            filtro.append('<a class="fltip" href="javascript:void(0);" data-tiposw="'+avevs[i]+'">'+ cchl.evtipos[avevs[i]] + '</a>');
        }
        
        for(var i = 0, l = temevs.length; i < l; i++) {
            if(cchl.evtemas[temevs[i]] != undefined) {
                filtrotema.append('<a class="fltem" href="javascript:void(0);" data-tiposw="'+temevs[i]+'">'+ cchl.evtemas[temevs[i]] + '</a>');    
            }            
        }        
        
        
        
        //Tabs
        jQuery('div.filtrotab', element).hide();
        jQuery('div.filtrotab.active', element).show();
        //Tabs filtro
        jQuery('.filtronav a', element).on('click', function(event) {
            event.preventDefault();
            //Reseteo el filtro
            eventos.show();
            //Saco las clases activas
            jQuery('div.filtrotema a, div.filtro a', element).removeClass('on')
            var active = jQuery('.filtronav a.active', element);
            var activetab = jQuery('.filtrotab.active', element);
            activetab.hide().removeClass('active');
            active.removeClass('active');
            thisdatafilter = jQuery(this).attr('data-relfilter');
            jQuery('.filtrotab[data-filter="' + thisdatafilter + '"]', element).show().addClass('active');
            jQuery(this).addClass('active');
        });
        //Ajusto altura para elemento
        var lidiaaltura = jQuery(element).height();
        jQuery('ul.calendario-filsa').height(lidiaaltura);
}


jQuery(document).ready(function($) {


$("#faq .preg").click(function(){
       if($(this).hasClass("activo")){
            $(this).removeClass("activo")
           }else{
           $(this).addClass("activo")
           }
       $(this).next().slideToggle();
       
   });


$('#slide_home').before('<div id="nav-2">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 7000, 
    pager:  '#nav-2' 
});
$('#slide_home2, #slide_socios2').before('<div id="nav-1">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 7000, 
    pager:  '#nav-1' 
});
$('#slide').before('<div id="nav">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 7000, 
    pager:  '#nav' 
});

$('.noticias-filsa').cycle({
    fx: 'scrollUp',
    speed: 'slow',
    timeout: 0,
    pager: '#notfilsapager',
    pagerAnchorBuilder: function( index, element) {
        console.log(index);
        return '<a href="#"></a>';
    }
});

//Toma contador Facebook y twitter
        var sharer = $('.sharer');
        var durl = sharer.data('url');
        var fbshares = 0;
        var twts = 0;

        $.getJSON('http://graph.facebook.com/?id=' + durl, function(json) {
            fbshares = +json.shares || 0;
            $('.sharer__facebook', sharer).append('<span>' + parseInt(fbshares) + '</span>');
        });

        $.getJSON('http://cdn.api.twitter.com/1/urls/count.json?url=' + durl + '&callback=?', function(json) {
            twts = +json.count || 0;
            $('.sharer__twitter', sharer).append('<span>' + parseInt(twts) + '</span>');
        });


$('.calendario-filsa').cycle({
    fx: 'fade',
    speed: 'fast',
    timeout: 0,
    pager: '#navfilsa',
    width: '100%',
    pagerAnchorBuilder: function( index, element) {
        var dia = $(element).data('dia');
        var ndia = $(element).data('ndia');
        var mes = $(element).data('mes');
        var hoy = 'otrodia';
        if($(element).hasClass('hoy')) {
            hoy = 'hoy';
        };
        return '<a href="#" class="' + hoy + '"><span class="dia">' + dia + ' </span><span class="ndia">' + ndia + '</span><span class="mes"> ' + mes + ' </span></a>';
    },
    onPagerEvent: function( index, element) {
        cchl_enableFilters(element);
    }
});

//Agregar filtro al primer día
$('ul.calendario-filsa li:first').append(function() {
    var eventos = $('div.evento', this);
    eventos.show();

        var avevs = [];
        var evsarr = [];
        //Filtro para tema de evento
        var temevs = [];
        var temsarr = [];
        //Escaneo todos los tipos de eventos disponibles
        eventos.each(function() {
            var evs = $(this).data('cchl_tipoevento');
            var tems = $(this).data('cchl_temaevento');
            if(evs != undefined) {
            evsarr = evs.split(' ');
            //console.log(evsarr);
            for(var i = 0, l = evsarr.length; i < l; i++) {
                if($.inArray(evsarr[i], avevs) == -1) {
                    avevs.push(evsarr[i]);
                    }
                }
            }
            //Temas
            if(tems != undefined) {
            temsarr = tems.split(' ');
            //console.log(temsarr);
            for(var i = 0, l = temsarr.length; i < l; i++) {
                if($.inArray(temsarr[i], temevs) == -1) {
                    temevs.push(temsarr[i]);
                    }
                }
            }  
        });
        //Construyo menu de navegación
        var filtro = $('ul.calendario-filsa li:first div.filtro');
        var filtrotema = $('div.filtrotema');

        //ordeno por nombre
        avevs.sort();
        filtro.empty();


        for(var i = 0, l = avevs.length; i < l; i++) {
            filtro.append('<a href="#" data-tiposw="'+avevs[i]+'">'+ cchl.evtipos[avevs[i]] + '</a>');
        }

        
        for(var i = 0, l = temevs.length; i < l; i++) {
            filtrotema.append('<a href="#" data-tiposw="'+temevs[i]+'">'+ cchl.evtemas[temevs[i]] + '</a>');
        }   
        
         
        //Tabs
        $('div.filtrotab', this).hide();
        $('div.filtrotab.active', this).show();
        //Ajusto altura para elemento
        var lidiaaltura = $(this).height();
        $('ul.calendario-filsa').height(lidiaaltura);
});


$('div.filtro, .eventos-load').on('click','a.fltip', function(event) {
    $('div.filtro a').removeClass('on');
    console.log('clickfiltro');
    event.preventDefault();
    //console.log($(this).parent());
    //Escojo todos los que corresponden al evento dentro de mi día
    var parentdata = $(this).parent().data('id');
    var parentdiv = $('div.filtro[data-id="' + parentdata + '"]');
    var all = $('div.evento[data-top="' + parentdata + '"]');
    var thistipo = $(this).data('tiposw');
    var selected = $('div.evento[data-cchl_tipoevento~="' + thistipo + '"]');
    all.hide();
    selected.show();
    $(this).addClass('on');
});

$('div.filtrotema, .eventos-load').on('click','a.fltem', function(event) {
    $('div.filtrotema a').removeClass('on');
    event.preventDefault();
    //console.log($(this).parent());
    //Escojo todos los que corresponden al evento dentro de mi día
    var parentdata = $(this).parent().data('id');
    var parentdiv = $('div.filtrotema[data-id="' + parentdata + '"]');
    var all = $('div.evento[data-top="' + parentdata + '"]');
    var thistipo = $(this).data('tiposw');
    var selected = $('div.evento[data-cchl_temaevento~="' + thistipo + '"]');
    all.hide();
    selected.show();
    $(this).addClass('on');
});

//Tabs filtro
var firstel = $('ul.calendario-filsa li:first');
        $('.filtronav a', firstel).on('click', function(event) {
            var eventos = $('div.evento', this);
            event.preventDefault();
            //Reseteo el filtro
            eventos.show();
            //Saco las clases activas
            $('div.filtrotema a, div.filtro a', firstel).removeClass('on')
            var active = $('.filtronav a.active', firstel);
            var activetab = $('.filtrotab.active', firstel);
            activetab.hide().removeClass('active');
            active.removeClass('active');
            thisdatafilter = $(this).attr('data-relfilter');
            $('.filtrotab[data-filter="' + thisdatafilter + '"]', firstel).show().addClass('active');
            $(this).addClass('active');
        }); 


//Hago un filtro para todos los eventos.
var tipos = cchl.evtipos;
var temas = cchl.evtemas;
var filtodos = $('select#todos-eventos-tipos, select#todos-eventos-temas');

    for(var i in tipos) {
           if(tipos.hasOwnProperty(i)) {
                $('select#todos-eventos-tipos[data-filter="cchl_tipoevento"]').append('<option value="' + i + '">' + tipos[i] + '</option>'); 
           }
    }

    for(var i in temas) {
           if(temas.hasOwnProperty(i)) {
                $('select#todos-eventos-temas[data-filter="cchl_temaevento"]').append('<option value="' + i + '">' + temas[i] + '</option>'); 
           }
    }


$('.filtrotab').hide();
$('.filtrotab.active').show();
//Tabs filtro
        $('.filtronav.selectabs a').on('click', function(event) {
            event.preventDefault();
            $('.wraptodos h2').empty().append('Escoge un filtro');
            //Saco las clases activas
            $('div.filtrotema a, div.filtro a').removeClass('on');
            var active = $('.filtronav.selectabs a.active');
            var activetab = $('.filtrotab.active');
            activetab.hide().removeClass('active');
            active.removeClass('active');
            thisdatafilter = $(this).attr('data-relfilter');
            $('.filtrotab[data-filter="' + thisdatafilter + '"]').show().addClass('active');
            $(this).addClass('active');
            //Reseteo los filtros
            $('.wraptodos ul.calendario-filsa li').empty();
            $('.selectwrap select').val(0);
        });

filtodos.on('change', function(event) {
    var wraptodos = $('.wraptodos');
    var filtertype = $(this).data('filter');
    var sumheight = 0;
    console.log(filtertype);
    var calappend = $('ul.calendario-filsa li', wraptodos);
    var selected = $('option:selected', this);
    $('h2', wraptodos).empty();
    $('h2', wraptodos).append(selected.text());
    //Le meto todos los bichos correspondientes
    var selectedevents = $('div.evento[data-' + filtertype + '~="'+ selected.attr('value') +'"]');
    calappend.empty();
    selectedevents.clone().appendTo(calappend).show();
    $('ul.calendario-filsa li div.evento', wraptodos).each(function(index, element) {
        var elemh = $(element).outerHeight();
        sumheight = sumheight + elemh + 6;
    });
    $('ul.calendario-filsa').height(sumheight);

});

//Tabs general y filtro
var tabdias = $('.tabdias');
var tabtodos = $('.tabtodos');
var tabgratis = $('.tabgratis');

tabtodos.hide();
tabgratis.hide();


$('.navprincipaleventos a').on('click', function(event) {    
    var datathis = $(this).data('tab');
    var activetab = $('.navprincipaleventos a.active');
    if(datathis == 'link') {
        window.location($(this).attr('href'));
    } else {
        event.preventDefault();
        activetab.removeClass('active');
        $('.tabgen.active').hide().removeClass('active');
        $(this).addClass('active');
        $('#' + datathis).show().addClass('active');
        //Reseteo los filtros
        $('.wraptodos ul.calendario-filsa li').empty();
        $('.selectwrap select').val(0);    
    }
    
});

$('body.page-id-108 #menu-item-54759').addClass('current_page_item current-menu-item');

//Activo el calendario para el día de hoy
$('#navfilsa a.hoy, #diaseventos ul li a.hoy').trigger('click');

//Menú móvil FILSA 2015
$('.filsa-header-mobile a.triggernav').on('click', function() {
    var nav = $('nav.mobile-menu-filsa');
    if( nav.hasClass('inactive') ) {
        nav.removeClass('inactive').addClass('active');
    } else {
        nav.removeClass('active').addClass('inactive');
    }
});

$('nav.mobile-menu-filsa a').on('click', function() {
    console.log('inclick');
    $('nav.mobile-menu-filsa').removeClass('active').addClass('inactive');
});

}); 


	  
	  