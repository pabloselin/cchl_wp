<?php
                $kits_de_prensa = getGroupOrder('kit_de_prensa_archivo');
                foreach($kits_de_prensa as $kit_de_prensa){?> 
                  
				  <div class="info_kit">
					<?php echo '<a class="btn btn-primary" href="'.get('kit_de_prensa_archivo',$kit_de_prensa).'">
                    <i class="fa fa-download"></i> DESCARGAR</a>';?>
				<?php } ?>
            	 </div>