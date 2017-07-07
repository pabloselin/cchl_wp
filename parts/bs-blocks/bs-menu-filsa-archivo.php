<div class="menu-filsa-archivo">
                <?php
                    $menuoption = get_post_meta($post->ID, '_cchl_custompage_menu', true);
                    $menuvalue = ($menuoption)? $menuoption : 'default';
                    wp_nav_menu( array( 'theme_location' => $menuoption) );
                ?>
            </div>