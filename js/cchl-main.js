

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

//Tabs generales para multimedia
var tabs = $('#tabs');

$('.tab-panel', tabs).hide();
$('.tab-panel.active', tabs).show();

$('.tab-nav li a', tabs).on('click', function(element) {
    var activetab = $('.tab-panel.active', tabs);
    var activebutton = $('.tab-nav li.active', tabs);
    if( $(this).hasClass('active') ) {
            element.preventDefault();
        } else {
            element.preventDefault();
            
            activetab.fadeOut().removeClass('active');
            activebutton.removeClass('active');

            $(this).parent('li').addClass('active');
            $( $(this).attr('href') ).fadeIn().addClass('active');
            
        }
    });

//Featherlight activation
$('div.feria-galeria.imagenes a').featherlight({
        type: 'image'
    });

$('div.feria-galeria.imagenes a').featherlight({
        type: 'iframe',
        targetAttr: 'href'
    });

}); 


	  
	  