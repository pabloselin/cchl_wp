<div id="colabs-filsa">
                <?php 
                $invita = getGroupOrder('invita_logo_invita');
                if($invita):
                ?>
                <h3>Invita</h3>
                    <ul class="colabs">
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
                            ?>                
                    </ul>
                <?php endif;

                    $mediaps = getGroupOrder('mediapartners_logo_mediapartner');
                    if($mediaps):
                ?>
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
                                endforeach;
                                
                            ?>                
                    </ul>
                    <?php endif;
                    $ausps = getGroupOrder('auspiciadores_logo_auspiciador');
                    if($ausps):
                    ?>
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
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;
                    $colabs = getGroupOrder('info_socioes_logo_colaborador');
                    if($colabs):
                ?>

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
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
                </div>