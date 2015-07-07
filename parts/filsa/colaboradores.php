<?php if(is_page(32963)):?>
                <div id="colabs-filsa">
                 <?php 
                    $invita = getGroupOrder('invita_logo_invita');
                    if($invita):?>
                     <h3>Invita</h3>
                            <ul class="colabs invita">
                    <?php 
                        foreach($invita as $inv): ?>
                           
                                   
                                            
                                            <li>
                                                <?php echo get_image('invita_logo_invita', $inv);?>
                                                <h3><?php echo get('invita_nombre', $inv);?></h3>
                                                <?php 
                                                    if(get('invita_url_invita', $inv)):
                                                        echo '<a target="_blank" href="'.get('invita_url_invita', $inv).'">Web</a>';
                                                    endif;
                                                ?>
                                            </li>

                                        <?php 
                                        endforeach;
                                        endif;
                                    ?>                
                            </ul>
                <?php 
                    $auspicia = getGroupOrder('auspicia_logo_auspicia');
                    if($auspicia):?>
                     <h3>Auspicia</h3>
                            <ul class="colabs auspicia invita">
                    <?php 
                        foreach($auspicia as $auspi): ?>
                           
                                   
                                            
                                            <li>
                                                <?php echo get_image('auspicia_logo_auspicia', $auspi);?>
                                                <h3><?php echo get('auspicia_nombre_auspicia', $auspi);?></h3>
                                                <?php 
                                                    if(get('auspicia_url_auspicia', $auspi)):
                                                        echo '<a target="_blank" href="'.get('auspicia_url_auspicia', $auspi).'">Web</a>';
                                                    endif;
                                                ?>
                                            </li>

                                        <?php 
                                        endforeach;
                                        endif;
                                    ?>                
                            </ul>
                <?php 
                  $mediaps = getGroupOrder('mediapartners_logo_mediapartner');
                  if($mediaps):?>
                  <h3>Mediapartners</h3>
                    <ul class="colabs">
                    <?php 
                    foreach($mediaps as $mediap): ?>

                    
                            
                                    
                                    <li>
                                        <?php echo get_image('mediapartners_logo_mediapartner', $mediap);?>
                                        <h3><?php echo get('mediapartners_nombre_mediapartner', $mediap);?></h3>
                                        <?php 
                                            if(get('mediapartners_url_mediapartner', $mediap)):
                                                echo '<a target="_blank" href="'.get('mediapartners_url_mediapartner', $mediap).'">Web</a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;?>
                                </ul>
                                <?php
                                endif;
                            ?>                
                    
                    <?php 
                 $ausps = getGroupOrder('auspiciadores_logo_auspiciador');
                    if($ausps):?>
                    <h3>Patrocinadores</h3>
                                <ul class="colabs">
                    <?php 
                        foreach($ausps as $ausp): ?>
                            
                                        
                                                
                                                <li>
                                                    <?php echo get_image('auspiciadores_logo_auspiciador', $ausp);?>
                                                    <h3><?php echo get('auspiciadores_nombre', $ausp);?></h3>
                                                    <?php 
                                                        if(get('auspiciadores_url_auspiciador', $ausp)):
                                                            echo '<a target="_blank" href="'.get('auspiciadores_url_auspiciador', $ausp).'">Web</a>';
                                                        endif;
                                                    ?>
                                                </li>

                                            <?php 
                                            
                                            endforeach;?>
                                            </ul>
                                            <?php 
                                            endif;
                                        ?>                
                                
                                
                <?php 
                $colabs = getGroupOrder('info_socioes_logo_colaborador');
                if($colabs):?>
                <h3>Colaboradores</h3>
                <ul class="colabs">
                <?php
                foreach($colabs as $colab): ?>
                    
                                    <li>
                                        <?php echo get_image('info_socioes_logo_colaborador', $colab);?>
                                        <h3><?php echo get('info_socioes_nombre', $colab);?></h3>
                                        <?php 
                                            if(get('info_socioes_url_colaborador', $colab)):
                                                echo '<a target="_blank" href="'.get('info_socioes_url_colaborador', $colab).'">Web</a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;?>
                                </ul>
                                <?php 
                                endif;
                            ?>                
                    

                

                 
                </div>
            <?php endif;?>