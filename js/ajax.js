var $j = jQuery.noConflict();
var $base = "";

$j(document).ready(function() { 

$j("#faq .preg").click(function(){
       if($j(this).hasClass("activo")){
		    $j(this).removeClass("activo")
		   }else{
		   $j(this).addClass("activo")
		   }
	   $j(this).next().slideToggle();
	   
   });
      
	  
});




$j(document).ready(function() {

$j('#slide_home').before('<div id="nav-2">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 7000, 
    pager:  '#nav-2' 
});
$j('#slide_home2, #slide_socios2').before('<div id="nav-1">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 7000, 
    pager:  '#nav-1' 
});
$j('#slide').before('<div id="nav">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 7000, 
    pager:  '#nav' 
});

$j('.noticias-filsa').cycle({
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
        var sharer = $j('.sharer');
        var durl = sharer.data('url');
        var fbshares = 0;
        var twts = 0;

        $j.getJSON('http://graph.facebook.com/?id=' + durl, function(json) {
            fbshares = +json.shares || 0;
            $j('.sharer__facebook', sharer).append('<span>' + parseInt(fbshares) + '</span>');
        });

        $j.getJSON('http://cdn.api.twitter.com/1/urls/count.json?url=' + durl + '&callback=?', function(json) {
            twts = +json.count || 0;
            $j('.sharer__twitter', sharer).append('<span>' + parseInt(twts) + '</span>');
        });


$j('.calendario-filsa').cycle({
    fx: 'fade',
    speed: 'fast',
    timeout: 0,
    pager: '#navfilsa',
    pagerAnchorBuilder: function( index, element) {
        var dia = $j(element).data('dia');
        var ndia = $j(element).data('ndia');
        var mes = $j(element).data('mes');
        var hoy = 'otrodia';
        if($j(element).hasClass('hoy')) {
            hoy = 'hoy';
        };
        return '<a href="#" class="' + hoy + '"><span class="dia">' + dia + ' </span><span class="ndia">' + ndia + '</span><span class="mes"> ' + mes + ' </span></a>';
    },
    onPagerEvent: function( index, element) {
        var eventos = $j('div.evento', element);
        //reseteo las ocultaciones previas
        eventos.show();

        var avevs = [];
        var evsarr = [];
        //Filtro para tema de evento
        var temevs = [];
        var temsarr = [];
        //Escaneo todos los tipos de eventos disponibles
        eventos.each(function() {
            var evs = $j(this).data('cchl_tipoevento');
            var tems = $j(this).data('cchl_temaevento');
            if(evs != undefined) {
            evsarr = evs.split(' ');
            //console.log(evsarr);
            for(var i = 0, l = evsarr.length; i < l; i++) {
                if($j.inArray(evsarr[i], avevs) == -1) {
                    avevs.push(evsarr[i]);
                    }
                }
            }
            //Temas
            if(tems != undefined) {
            temsarr = tems.split(' ');
            //console.log(temsarr);
            for(var i = 0, l = temsarr.length; i < l; i++) {
                if($j.inArray(temsarr[i], temevs) == -1) {
                    temevs.push(temsarr[i]);
                    }
                }
            }
        });
        //Construyo menu de navegación
        var filtro = $j('div.filtro');
        var filtrotema = $j('div.filtrotema');
        //ordeno por nombre
        avevs.sort();
        temevs.sort();
        filtro.empty();
        filtrotema.empty();
        for(var i = 0, l = avevs.length; i < l; i++) {
            filtro.append('<a href="#" data-tiposw="'+avevs[i]+'">'+ cchl.evtipos[avevs[i]] + '</a>');
        }
        for(var i = 0, l = temevs.length; i < l; i++) {
            filtrotema.append('<a href="#" data-tiposw="'+temevs[i]+'">'+ cchl.evtemas[temevs[i]] + '</a>');
        }
        //Tabs
        $j('div.filtrotab', element).hide();
        $j('div.filtrotab.active', element).show();
        //Tabs filtro
        $j('.filtronav a', element).on('click', function(event) {
            event.preventDefault();
            //Reseteo el filtro
            eventos.show();
            //Saco las clases activas
            $j('div.filtrotema a, div.filtro a', element).removeClass('on')
            var active = $j('.filtronav a.active', element);
            var activetab = $j('.filtrotab.active', element);
            activetab.hide().removeClass('active');
            active.removeClass('active');
            thisdatafilter = $j(this).attr('data-relfilter');
            $j('.filtrotab[data-filter="' + thisdatafilter + '"]', element).show().addClass('active');
            $j(this).addClass('active');
        });
        //Ajusto altura para elemento
        var lidiaaltura = $j(element).height();
        $j('ul.calendario-filsa').height(lidiaaltura);
    }
});

//Agregar filtro al primer día
$j('ul.calendario-filsa li:first').append(function() {
    var eventos = $j('div.evento', this);
    eventos.show();

        var avevs = [];
        var evsarr = [];
        //Filtro para tema de evento
        var temevs = [];
        var temsarr = [];
        //Escaneo todos los tipos de eventos disponibles
        eventos.each(function() {
            var evs = $j(this).data('cchl_tipoevento');
            var tems = $j(this).data('cchl_temaevento');
            if(evs != undefined) {
            evsarr = evs.split(' ');
            //console.log(evsarr);
            for(var i = 0, l = evsarr.length; i < l; i++) {
                if($j.inArray(evsarr[i], avevs) == -1) {
                    avevs.push(evsarr[i]);
                    }
                }
            }
            //Temas
            if(tems != undefined) {
            temsarr = tems.split(' ');
            //console.log(temsarr);
            for(var i = 0, l = temsarr.length; i < l; i++) {
                if($j.inArray(temsarr[i], temevs) == -1) {
                    temevs.push(temsarr[i]);
                    }
                }
            }  
        });
        //Construyo menu de navegación
        var filtro = $j('ul.calendario-filsa li:first div.filtro');
        var filtrotema = $j('div.filtrotema');

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
        $j('div.filtrotab', this).hide();
        $j('div.filtrotab.active', this).show();
        //Ajusto altura para elemento
        var lidiaaltura = $j(this).height();
        $j('ul.calendario-filsa').height(lidiaaltura);
});


$j('div.filtro').on('click','a', function(event) {
    $j('div.filtro a').removeClass('on');
    event.preventDefault();
    //console.log($j(this).parent());
    //Escojo todos los que corresponden al evento dentro de mi día
    var parentdata = $j(this).parent().data('id');
    var parentdiv = $j('div.filtro[data-id="' + parentdata + '"]');
    var all = $j('div.evento[data-top="' + parentdata + '"]');
    var thistipo = $j(this).data('tiposw');
    var selected = $j('div.evento[data-cchl_tipoevento~="' + thistipo + '"]');
    all.hide();
    selected.show();
    $j(this).addClass('on');
});

$j('div.filtrotema').on('click','a', function(event) {
    $j('div.filtrotema a').removeClass('on');
    event.preventDefault();
    //console.log($j(this).parent());
    //Escojo todos los que corresponden al evento dentro de mi día
    var parentdata = $j(this).parent().data('id');
    var parentdiv = $j('div.filtrotema[data-id="' + parentdata + '"]');
    var all = $j('div.evento[data-top="' + parentdata + '"]');
    var thistipo = $j(this).data('tiposw');
    var selected = $j('div.evento[data-cchl_temaevento~="' + thistipo + '"]');
    all.hide();
    selected.show();
    $j(this).addClass('on');
});

//Tabs filtro
var firstel = $j('ul.calendario-filsa li:first');
        $j('.filtronav a', firstel).on('click', function(event) {
            var eventos = $j('div.evento', this);
            event.preventDefault();
            //Reseteo el filtro
            eventos.show();
            //Saco las clases activas
            $j('div.filtrotema a, div.filtro a', firstel).removeClass('on')
            var active = $j('.filtronav a.active', firstel);
            var activetab = $j('.filtrotab.active', firstel);
            activetab.hide().removeClass('active');
            active.removeClass('active');
            thisdatafilter = $j(this).attr('data-relfilter');
            $j('.filtrotab[data-filter="' + thisdatafilter + '"]', firstel).show().addClass('active');
            $j(this).addClass('active');
        }); 


//Hago un filtro para todos los eventos.
var tipos = cchl.evtipos;
var temas = cchl.evtemas;
var filtodos = $j('select#todos-eventos-tipos, select#todos-eventos-temas');

    for(var i in tipos) {
           if(tipos.hasOwnProperty(i)) {
                $j('select[data-filter="cchl_tipoevento"]').append('<option value="' + i + '">' + tipos[i] + '</option>'); 
           }
    }

    for(var i in temas) {
           if(temas.hasOwnProperty(i)) {
                $j('select[data-filter="cchl_temaevento"]').append('<option value="' + i + '">' + temas[i] + '</option>'); 
           }
    }


$j('.filtrotab').hide();
$j('.filtrotab.active').show();
//Tabs filtro
        $j('.filtronav.selectabs a').on('click', function(event) {
            event.preventDefault();
            $j('.wraptodos h2').empty().append('Escoge un filtro');
            //Saco las clases activas
            $j('div.filtrotema a, div.filtro a').removeClass('on');
            var active = $j('.filtronav.selectabs a.active');
            var activetab = $j('.filtrotab.active');
            activetab.hide().removeClass('active');
            active.removeClass('active');
            thisdatafilter = $j(this).attr('data-relfilter');
            $j('.filtrotab[data-filter="' + thisdatafilter + '"]').show().addClass('active');
            $j(this).addClass('active');
            //Reseteo los filtros
            $j('.wraptodos ul.calendario-filsa li').empty();
            $j('.selectwrap select').val(0);
        });

filtodos.on('change', function(event) {
    var wraptodos = $j('.wraptodos');
    var filtertype = $j(this).data('filter');
    var sumheight = 0;
    console.log(filtertype);
    var calappend = $j('ul.calendario-filsa li', wraptodos);
    var selected = $j('option:selected', this);
    $j('h2', wraptodos).empty();
    $j('h2', wraptodos).append(selected.text());
    //Le meto todos los bichos correspondientes
    var selectedevents = $j('div.evento[data-' + filtertype + '~="'+ selected.attr('value') +'"]');
    calappend.empty();
    selectedevents.clone().appendTo(calappend).show();
    $j('ul.calendario-filsa li div.evento', wraptodos).each(function(index, element) {
        var elemh = $j(element).outerHeight();
        sumheight = sumheight + elemh + 6;
    });
    $j('ul.calendario-filsa').height(sumheight);

});

//Tabs general y filtro
var tabdias = $j('.tabdias');
var tabtodos = $j('.tabtodos');

tabtodos.hide();
$j('.navprincipaleventos a').on('click', function(event) {
    event.preventDefault();
    var datathis = $j(this).data('tab');
    console.log(datathis);
    var activetab = $j('.navprincipaleventos a.active');
    activetab.removeClass('active');
    $j('.tabgen.active').hide().removeClass('active');
    $j(this).addClass('active');
    $j('#' + datathis).show().addClass('active');
    //Reseteo los filtros
    $j('.wraptodos ul.calendario-filsa li').empty();
    $j('.selectwrap select').val(0);
});

$j('body.page-id-108 #menu-item-54759').addClass('current_page_item current-menu-item');

//Activo el calendario para el día de hoy
$j('#navfilsa a.hoy').trigger('click');

//Menú móvil FILSA 2015
$j('.filsa-header-mobile a.triggernav').on('click', function() {
    var nav = $j('nav.mobile-menu-filsa');
    if( nav.hasClass('inactive') ) {
        nav.removeClass('inactive').addClass('active');
    } else {
        nav.removeClass('active').addClass('inactive');
    }
});

}); 


	  
	  