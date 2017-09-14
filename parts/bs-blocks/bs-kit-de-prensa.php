<?php
			$kits_de_prensa = get_post_meta($post->ID, 'kit_de_prensa_archivo', true);
			
			if($kits_de_prensa):?>
                  
				  <div class="info_kit">
					<?php echo '<a class="btn btn-primary" href="'. cchl_legacy_file($kits_de_prensa) .'">
										<i class="fa fa-download"></i> DESCARGAR</a>';?>
					</div>
				<?php endif ?>
            	 