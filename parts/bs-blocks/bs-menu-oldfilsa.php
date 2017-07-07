    <div class="menu-filsa-anterior">
            <?php
                    $ancestors = get_post_ancestors($post->ID);

                    if(in_array(CCHL_FILSA2013, $ancestors) || $post->ID == CCHL_FILSA2013):
                        wp_nav_menu( array( 'theme_location' => 'menu-filsa-2013') );
                    elseif(in_array(CCHL_FILSA2012, $ancestors) || $post->ID == CCHL_FILSA2012):
                        wp_nav_menu( array( 'theme_location' => 'menu-filsa-2012') );
                    endif;?>
    </div>