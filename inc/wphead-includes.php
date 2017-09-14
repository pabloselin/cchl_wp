<?php 

/**
 * Returns Google Analytics when in production URL
 * 
 */

function cchl_analytics() {

	if(get_bloginfo('url') == 'https://camaradellibro.cl'):

	?>

	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-29366127-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>

	<?php

	endif;

}

add_action('wp_head', 'cchl_analytics');

/**
 * Returns Meta Viewport when responsive
 * 
 */

function cchl_metaviewport() {
	
	$isresponsive = cchl_isresponsive();

	if( $isresponsive == true ):

		echo '<meta name="viewport" content="width=device-width, user-scalable=no">';

	endif;

}

add_action( 'wp_head', 'cchl_metaviewport' );

function cchl_styleferiatemplate() { 
  //Chequea si algún parent está usando un template de feria
  global $post;
  $using_feria_template = checkferiatemplate($post->ID);
  $cchl_options = get_option( 'cchl_settings' );
  $special = $cchl_options['cchl_checkbox_special'];
  
  if($using_feria_template) {
    $color_1 = get_post_meta($using_feria_template, 'color_1', true);
    $color_2 = get_post_meta($using_feria_template, 'color_2', true);
    ?>
    <style type="text/css">
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
	}

	add_action('wp_head', 'cchl_styleferiatemplate');