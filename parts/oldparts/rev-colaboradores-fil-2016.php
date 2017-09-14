<?php 
                $invita = get_post_meta($post->ID, '_cchl_invita', true);
                
                if($invita):
                ?>
                <h3 class="colabheading">Invita</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($invita as $inv): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($inv['logo']);?>" alt="<?php echo $inv['nombre'];?>">
                                    <h3><?php echo $inv['nombre'];?></h3>
                                    <?php 
                                        if($inv['url']):
                                            echo '<a target="_blank" href="'. $inv['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
                
                <?php

                $organiza = get_post_meta($post->ID, '_cchl_organiza', true);
                if($organiza):?>
                <h3 class="colabheading">Organiza</h3>
                    <ul class="colabs invs">

                            <?php 
                                foreach($organiza as $org): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($org['logo']);?>" alt="<?php echo $org['nombre'];?>">
                                    <h3><?php echo $org['nombre'];?></h3>
                                    <?php 
                                        if($org['url']):
                                            echo '<a target="_blank" href="'. $inv['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
               
                <?php 
                $auspicia = get_post_meta($post->ID, '_cchl_auspicia', true);
                if($auspicia):
                ?>
                <h3 class="colabheading">Auspicia</h3>
                    <ul class="colabs aups">
                            <?php 
                                foreach($auspicia as $ausp): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($ausp['logo']);?>" alt="<?php echo $ausp['nombre'];?>">
                                    <h3><?php echo $ausp['nombre'];?></h3>
                                    <?php 
                                        if($ausp['url']):
                                            echo '<a target="_blank" href="'. $ausp['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php 
                $patrocinadores = get_post_meta($post->ID, '_cchl_patrocina', true);
                if($patrocinadores):
                ?>
                <h3 class="colabheading">Patrocina</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($patrocinadores as $patrocina): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($patrocina['logo']);?>" alt="<?php echo $patrocina['nombre'];?>">
                                    <h3><?php echo $patrocina['nombre'];?></h3>
                                    <?php 
                                        if($patrocina['url']):
                                            echo '<a target="_blank" href="'. $patrocina['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php 
                $colaboradores = get_post_meta($post->ID, '_cchl_colabora', true);
                if($colaboradores):
                ?>
                <h3 class="colabheading">Colabora</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($colaboradores as $colaborador): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($colaborador['logo']);?>" alt="<?php echo $colaborador['nombre'];?>">
                                    <h3><?php echo $colaborador['nombre'];?></h3>
                                    <?php 
                                        if($colaborador['url']):
                                            echo '<a target="_blank" href="'. $colaborador['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                

                    <?php $mediaps = get_post_meta($post->ID, '_cchl_media_partner', true);
                    if($mediaps):?>
                    <h3 class="colabheading">Mediapartners</h3>

                    <ul class="colabs media-partner-fil">
                            <?php 
                                
                                foreach($mediaps as $key=>$mediap): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($mediap['logo']);?>" alt="<?php echo $mediap['nombre'];?>">
                                    <h3><?php echo $mediap['nombre'];?></h3>
                                    <?php 
                                        if($mediap['url']):
                                            echo '<a target="_blank" href="'. $mediap['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                    <?php endif;?>