<?php 
$cchl_options = get_option('cchl_settings');
?>

 <div id="caja_twitter" class="twitter-box">
	 <h3><i class="fa fa-twitter"></i> Twitter @<?php echo $cchl_options['cchl_twitter'];?></h3><!--fin titulo twitter-->
 
	 <a class="twitter-timeline" href="https://twitter.com/<?php echo $cchl_options['cchl_twitter'];?>" data-chrome="nofooter noheader" height="416" data-widget-id="360783322961571840">Tweets por @<?php echo $cchl_options['cchl_twitter'];?></a>
 	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 </div><!--fin twitter-->