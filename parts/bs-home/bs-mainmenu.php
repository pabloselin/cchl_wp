
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
            <a class="navbar-brand visible-xs" href="#"><img src="<?php echo get_bloginfo('template_url');?>/img/cchl_logo_libro.svg" alt="<?php bloginfo('title');?>" width="250" height="19"/></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
                wp_nav_menu( array(
                    'menu'              => 'Principal',
                    'theme_location'    => 'Principal',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-mainmenu-collapse navbar-collapse',
                    'container_id'      => 'bs-mainmenu',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
    </nav>
</div>