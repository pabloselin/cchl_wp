jQuery(document).ready(function($) {

$("#faq .preg").click(function(){
       if($(this).hasClass("activo")){
            $(this).removeClass("activo")
           }else{
           $(this).addClass("activo")
           }
       $(this).next().slideToggle();
       
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

        if(sharer) {

            $.getJSON('https://graph.facebook.com/?id=' + durl, function(json) {
                //console.log(json);
                fbshares = +json.share.share_count || 0;
                $('.sharer__facebook', sharer).append('<span>' + parseInt(fbshares) + '</span>');
            });

        }

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
    
}); 


	  
	  