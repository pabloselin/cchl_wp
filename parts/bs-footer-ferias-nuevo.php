<?php 
    $options = get_option( 'cchl_settings' );
?>
    <footer class="footer-mobile visible-xs visible-sm">
        <ul>
            <li class="redes-footer"><a href="https://facebook.com/<?php echo $options['cchl_fbcamara'];?>"><i class="fa fa-facebook"></i></a> </li>
			<li class="redes-footer"><a href="https://twitter.com/<?php echo $options['cchl_twitter'];?>"><i class="fa fa-twitter"></i></a> </li>
			<li class="redes-footer"><a href="<?php echo $options['cchl_youtube'];?>"><i class="fa fa-youtube-play"></i></a> </li>
            <li class="redes-footer"><a href="https://instagram.com/<?php echo $options['cchl_instagram'];?>"><i class="fa fa-instagram"></i></a> </li>
        </ul>
    </footer>
	

<footer class="footer-ferias">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <p><a href="<?php echo get_bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/img/logos/cchl_logo_blanco.svg" alt="<?php bloginfo('name' );?>"></a></p>
                <p><em><?php bloginfo('description');?></em></p>
            </div>
            
            <div class="caja-info col-md-6">
                    
                    <address>
                        <div class="row">
                            <div class="col-xs-1"><i class="fa fa-map-marker fa-fw"></i> </div>
                            <div class="col-xs-11">
                                Av. Libertador Bernardo O´Higgins 1370 <br>
                                Oficina 502<br>
                                Santiago de Chile.
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-1"><i class="fa fa-phone fa-fw"></i></div>
                            <div class="col-xs-11">
                                <a style="display:inline;" href="tel:<?php echo $options['cchl_fono'];?>"><?php echo $options['cchl_fono'];?></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                            <i class="fa fa-envelope-o fa-fw"></i>
                            </div>
                            <div class="col-xs-11">
                            <a href="mailto:<?php echo $options['cchl_email'];?>"><?php echo $options['cchl_email'];?></a>
                            </div>
                        </div>
                    </address>
                </div>
            </div>
    </div>
    
</footer>
<?php wp_footer();?>
</body>
</html>
