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




j(document).ready(function() {

j('#slide_home').before('<div id="nav">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 3000, 
    pager:  '#nav' 
});


j('#slide').before('<div id="nav">').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 3000, 
    pager:  '#nav' 
});
}); 


	  
	  