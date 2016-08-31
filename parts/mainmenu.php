<ul id="topmenu-principal">
        	<?php wp_nav_menu( array('menu' => 'Principal' )); ?>
        </ul>
        <?php if(!is_home() && (in_category(33)||in_category(32)||in_category(101)||in_category(21)||in_category(68)||is_page(45)||is_page(88)||is_page(144)||is_page(90)) ):?>
                <?php 
                wp_nav_menu(
                    array(
                    'menu' => 'Socios - interior',
                    'menu_id' => 'menu-socios'
                        )
                    );?>
        <?php endif;?>