<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title();?></title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php 
  //Chequea si algún parent está usando un template de feria
  $using_feria_template = checkferiatemplate($post->ID);

  $cchl_options = get_option( 'cchl_settings' );

  $special = $cchl_options['cchl_checkbox_special'];
  
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

        body#feria #content #navfilsa.navfil.fil2016variant a.activeSlide.otrodia {
          background-color:<?php echo $color_1;?> !important;
          color:<?php echo $color_2;?> !important;  
        }

        body#feria #content #navfilsa.navfil.fil2016variant a.otrodia {
          background-color:#f0f0f0;
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

//Categorías extra para page-ferias

$feriasmultimediacats = array( CCHL_FLPA2016, CCHL_FILIJ2016 );

if( $isfilsa ):

	get_template_part('parts/header', 'filsa-2014' );

elseif( $isfilij ):

	get_template_part('parts/header', 'filij-2014' );

elseif( checkferia($post->ID, 53771) ):

	get_template_part('parts/header', 'fil' );

elseif( checkferia($post->ID, CCHL_FILSA2015, CCHL_CATSFILSA, 180) ):

	get_template_part('parts/header', 'filsa-2015' );

elseif( checkferia($post->ID, CCHL_FILSA2016, CCHL_CATSFILSA2016, 'filsa-2016') ):

  get_template_part('parts/header', 'filsa-2016');

elseif( checkferia($post->ID, CCHL_FILVINA2016) ):

  get_template_part('parts/header', 'filvina-2016');

elseif( checkferia($post->ID, CCHL_FILVINA2017) ):

  get_template_part('parts/header', 'filvina-2017');  

elseif( is_page_template('page-feria-principal.php') || $using_feria_template || is_single() && in_category( $feriasmultimediacats, $post->ID ) ):

  get_template_part('parts/header', 'feria');

elseif( $special ):

  get_template_part('parts/header', 'special');

else:

  if(is_home()):
	   
     get_template_part('parts/header', 'standard-new');

  else:

    get_template_part('parts/header', 'standard-new-interior');

  endif;

endif;

?>