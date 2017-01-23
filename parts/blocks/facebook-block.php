<?php 
    $cchl_options = get_option('cchl_settings');
    $fburl = 'https://www.facebook.com/' . $cchl_options['cchl_fbcamara'];
?>

			<div id="caja_facebook" class="facebook-box">
                 <h3><i class="fa fa-facebook"></i> Facebook</h3>
                 <div class="fb-page" data-href="<?php echo $fburl;?>" data-width="300" data-height="357" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $fburl;?>"><a href="<?php echo $fburl;?>">Cámara Chilena del Libro</a></blockquote></div></div>
            </div>