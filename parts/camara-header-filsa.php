<div class="camara-header-filsa">
			<div class="wrapchf">
				<a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2014/cchl_filsaheader.png" alt="<?php bloginfo('title');?>" /> CÁMARA CHILENA DEL LIBRO</a>
				<div class="feriaslink"><a href="#"><i class="fa fa-plus"></i> Ferias!</a>
				<?php $menumasferias = cchl_getmenus('menu-ferias-en-feria');?>
					
					<?php if($menumasferias) {

						echo '<ul class="dropdown-masferias">';	
							
							foreach($menumasferias as $menuitem) {
								
								echo '<li><a href="' . $menuitem->url . '">' . $menuitem->title . '</a></li>';

							}

						echo '</ul>';
						}?>
				</div>
			</div>
		</div>