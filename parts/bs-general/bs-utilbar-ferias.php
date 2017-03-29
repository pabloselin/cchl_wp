<div class="navbar navbar-default navbar-nomargin navbar-bs-ferias">
			<div class="container">
				<div class="navbar-header brand">
                    <a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2014/cchl_filsaheader.png" alt="<?php bloginfo('title');?>" /> <span class="hidden-sm hidden-xs">CÁMARA CHILENA DEL LIBRO</span></a>
                </div>

                <div class="feriaslink dropdown pull-right">
                        <a href="#" data-toggle="dropdown"><i class="fa fa-plus"></i> Ferias!</a>
                        <?php $menumasferias = cchl_getmenus('menu-ferias-en-feria');?>
                            
                            <?php if($menumasferias) {
                        
                                echo '<ul class="dropdown-menu">';	
                                    
                                    foreach($menumasferias as $menuitem) {
                                        
                                        echo '<li><a href="' . $menuitem->url . '">' . $menuitem->title . '</a></li>';
                        
                                    }
                        
                                echo '</ul>';
                                }?>
                </div>
                    
                
			</div>
</div>