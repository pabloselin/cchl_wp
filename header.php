<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title();?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if(checkferia($post->ID, CCHL_FILSA2015)) {?>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<?php
	}?>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-29366127-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<?php wp_head();?>
</head>
<?php 
//Cambiador de headers para distintas situaciones
$isfilsa = checkfilsa();
$isfilij = checkfilij();
if($isfilsa):
	get_template_part('parts/header', 'filsa-2014' );
elseif($isfilij):
	get_template_part('parts/header', 'filij-2014' );
elseif(checkferia($post->ID, 53771)):
	get_template_part('parts/header', 'fil' );
elseif(checkferia($post->ID, CCHL_FILSA2015, CCHL_CATSFILSA, 180)):
	get_template_part('parts/header', 'filsa-2015' );
else:
	get_template_part('parts/header', 'standard');
endif;
?>