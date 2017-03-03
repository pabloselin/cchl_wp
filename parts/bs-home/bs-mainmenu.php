
<div class="main-navbar-background">
    <nav class="navbar navbar-inverse main-navbar" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mainmenu-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="#"><img src="<?php echo get_bloginfo('template_url');?>/img/cchl_logo_libro.svg" alt="<?php bloginfo('title');?>" width="220" height="16"/></a>
        </div>
        <div class="collapse navbar-mainmenu-collapse navbar-collapse">
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php
                    wp_nav_menu( array(
                        'menu'              => 'Principal',
                        'theme_location'    => 'Principal',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'navbar-mainmenu-main',
                        'container_id'      => 'bs-mainmenu',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
            
            <div class="visible-xs extra-mobile-nav">
                
                <ul class="nav navbar-nav">
                    <li class="newsletter"><a href="<?php bloginfo('url'); ?>/suscripcion-al-newsletter">NEWSLETTER</a></li>
                    <li class="preguntas"><a href="<?php bloginfo('url'); ?>/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
                    <li class="mapadelsitio"><a href="<?php bloginfo('url'); ?>/mapa-de-sitio">MAPA del SITIO</a></li>
                    
                    <li class="redes">
                    
                    <a href="https://facebook.com/<?php echo $cchl_options['cchl_facebook'];?>"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/<?php echo $cchl_options['cchl_twitter'];?>"><i class="fa fa-twitter"></i></a> <a href="<?php echo $cchl_options['cchl_youtube'];?>"><i class="fa fa-youtube-play"></i></a> <a href="https://instagram.com/<?php echo $cchl_options['cchl_instagram'];?>"><i class="fa fa-instagram"></i></a>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>