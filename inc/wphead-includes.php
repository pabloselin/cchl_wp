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