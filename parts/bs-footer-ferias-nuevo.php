<?php 
    $options = get_option( 'cchl_settings' );
?>

<ul id="redes-moviles" class="redes-movil visible-xs nav navbar-nav">
                    <li class="menu-item"><a href="<?php echo filsa2017_get_option('filsa2017_facebook');?>"><i class="fa fa-fw fa-facebook-square"></i> </a></li>
                    <li class="menu-item"><a href="<?php echo filsa2017_get_option('filsa2017_twitter');?>"><i class="fa fa-fw fa-twitter"></i> </a> </li>
                    <li class="menu-item"><a href="<?php echo filsa2017_get_option('filsa2017_instagram');?>"><i class="fa fa-fw fa-instagram"></i> </a> </li>
                    <li class="menu-item"><a href="<?php echo filsa2017_get_option('filsa2017_flickr');?>"><i class="fa fa-fw fa-flickr"></i> </a></li>
</ul>

<footer class="footer-ferias">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <p><a href="<?php echo get_bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/img/logos/cchl_logo_blanco.svg" alt="<?php bloginfo('name' );?>"></a></p>
                <p><em>67 años trabajando por el libro y la lectura</em></p>
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
