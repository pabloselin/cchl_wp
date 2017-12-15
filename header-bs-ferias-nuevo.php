<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title();?></title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head();?>
</head>
<?php 
    $cchl_options = get_option( 'cchl_settings' );
    $postid = cchl_current_fields_id('bs-plantilla-feria.php')? cchl_current_fields_id('bs-plantilla-feria.php') : cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
    $header_lg = get_post_meta($postid, 'cchl_bsferiaheader_lg', true);
    $header_sm = get_post_meta($postid, 'cchl_bsferiaheader_sm', true);
    $menuferia = get_post_meta($postid, 'cchl_bsmenuferia', true);
    $cssclass = get_post_meta($postid, 'cchl_bsclass', true);
?>
<body <?php body_class($cssclass);?>>
<?php get_template_part( 'parts/fb-sdk');?>


<div class="camara-header-filsa">
			<div class="container animated fadeInDown">
                <span class="hidden-xs">
                    <a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2014/cchl_filsaheader.png" alt="<?php bloginfo('title');?>" /> CÁMARA CHILENA DEL LIBRO</a>
                </span>
                
                <div class="redes">
                    <a href="<?php echo filsa2017_get_option('filsa2017_facebook');?>"><i class="fa fa-fw fa-facebook-square"></i></a>
                    <a href="<?php echo filsa2017_get_option('filsa2017_twitter');?>"><i class="fa fa-fw fa-twitter"></i></a>
                    <a href="<?php echo filsa2017_get_option('filsa2017_instagram');?>"><i class="fa fa-fw fa-instagram"></i></a>
                    <a href="<?php echo filsa2017_get_option('filsa2017_flickr');?>"><i class="fa fa-fw fa-flickr"></i></a>
                </div>
			</div>
</div>
<header class="site-header">


       <div class="container nopad">
            <div class="row">
               <div class="col-md-12">
                   <img class="banner-feria-md hidden-sm hidden-xs" src="<?php echo $header_lg;?>" alt="<?php echo get_the_title($postid);?>">
                   <img class="banner-feria-sm visible-sm visible-xs" src="<?php echo $header_sm;?>" alt="<?php echo get_the_title($postid);?>">
               </div>
           </div>
       </div>


<nav class="navbar navbar-inverse feria-navbar" role="navigation">
  <div class="container feria-mobile-nav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a href="<?php echo get_permalink($postid);?>" class="mobile-home" ><i class="fa fa-home"></i></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-feria-mobile">
        <span class="labelmenu">menú</span>
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
        
        <div class="visible-xs navbar-mobile">
            <?php
                wp_nav_menu( array(
                    'menu'              => $menuferia,
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'menu-feria-mobile',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                );
            ?>
        </div>
    </div>
    <div class="container feria-desktop-nav">
        <?php
            wp_nav_menu( array(
                'menu'    => $menuferia,
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'menu-feria-desktop',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
        ?>

   <!--     <a href="#" class="navigation-toggle"><i class="fa fa-bars"></i> ver todo</a>

        <div class="feria-desktop-extra animated slideInDown">
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => $menuferia_extra,
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'menu-feria-desktop-inside',
                        'container_id'      => 'menu-feria-desktop-inside',
                        'menu_class'        => 'inside-nav')
                        // 'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        // 'walker'            => new WP_Bootstrap_Navwalker())
                    );
                ?>
        </div>
    </div>
</nav>-->

<!--<nav class="accesos-rapidos container">

    <div class="row">
        <div class="col-md-12">
            <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'accesos-feria-2017',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'navbar-accesos',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker())
                    );
                ?>
        </div>
    </div>
</nav>-->
</header>
