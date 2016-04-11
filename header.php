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
<?php 
  //Chequea si algún parent está usando un template de feria
  $using_feria_template = checkferiatemplate($post->ID);
  if($using_feria_template) {
    $color_1 = get('color_1', 1, 1, 1, $using_feria_template);
    $color_2 = get('color_2', 1, 1, 1, $using_feria_template);
    ?>
    <style>
        body#feria #sidebar_interior.menu-feria-especial div>ul>li:first-of-type > a {
          background-color: <?php echo $color_1;?> !important;
          color:<?php echo $color_2;?> !important;
        }

        body#feria a.triggernav {
          color:<?php echo $color_1;?> !important;
        }

        body#feria .mobile-menu-filsa {
          border-top:1px solid <?php echo $color_1;?> !important;
        }

        body#feria .mobile-menu-filsa ul > li > a {
          background-color:<?php echo $color_1;?> !important;
          color:white !important;
          text-transform:uppercase;
          font-size:22px;
        }

        body#feria .mobile-menu-filsa ul li ul.sub-menu li a {
          background-color:<?php echo adjustBrightness($color_1, 190);?> !important;
          color:<?php echo $color_2;?> !important;
        }
    </style>
    <?php
  }
?>
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
elseif(checkferia($post->ID, CCHL_FILVINA2016)):
  get_template_part('parts/header', 'filvina-2016');
elseif(is_page_template('page-feria-principal.php') || $using_feria_template):
  get_template_part('parts/header', 'feria');
else:
	get_template_part('parts/header', 'standard');
endif;
?>