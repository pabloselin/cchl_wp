<?php
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		
		if($term->name == 'Agenda-Capacitacion'){
			query_posts('page_id=25');
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			if(!$post->post_parent){
				// will display the subpages of this top level page
				$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
			}
			else{
				if($post->ancestors) {
					// now you can get the the top ID of this page
					// wp is putting the ids DESC, thats why the top level ID is the last one
					$ancestors = end($post->ancestors);
					$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
				}
			}
			
			if ($children) { ?>
				<ul>
					<?php echo $children; ?>
					<li class="current_page_item"><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/">Capacitación</a>
						<ul class="children">
							  <li class="current_page_item"><a href="<?php bloginfo('url'); ?>/eventos/category/agenda/-capacitacion">Agenda</a></li>
                              <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/seminarios/">Seminarios</a></li>
                              <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/talleres/">Talleres</a></li>
						</ul>
					</li>
				</ul>
			<?php } endwhile;endif;wp_reset_query(); ?>
		<?php 
		}else{ 
			
        	wp_nav_menu( array('menu' => 'menu-ferias' )); 

        } ?>