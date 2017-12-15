<?php 
    $postid = cchl_current_fields_id('bs-plantilla-feria.php') ? cchl_current_fields_id('bs-plantilla-feria.php') : cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
    $header_lg = get_post_meta($postid, 'cchl_bsferiaheader_lg', true);
    $header_sm = get_post_meta($postid, 'cchl_bsferiaheader_sm', true);
    $menuferia = get_post_meta($postid, 'cchl_bsmenuferia', true);
    $menuitems = wp_get_nav_menu_items( $menuferia );
?>

<div class="main-navbar-background visible-sm visible-xs bs-mobile-menu-ferias">
    <nav class="navbar navbar-inverse main-navbar" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="brand">
                    <a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/cchl_logo_blanco.svg" alt="<?php bloginfo('title');?>" /></a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mainmenu-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-mainmenu-collapse navbar-collapse">
            
            <ul class="nav navbar-nav">
                <?php foreach($menuitems as $menuitem):?>
                <li><a href="<?php echo get_permalink($menuitem->object_id);?>"><?php echo $menuitem->title;?></a></li>
                <?php endforeach;?>
            </ul>

        </div>
    </nav>
</div>
