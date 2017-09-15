<?php if(is_page(32963)):?>
                <div id="colabs-filsa">
                 <?php 
                    $invita = get_post_meta($post->ID, '_cchl_invita', true);
                    if($invita):?>
                     <h3>Invita</h3>
                            <ul class="colabs invita">
                    <?php 
                        foreach($invita as $inv): ?>
                           
                                   
                                            
                           <li>
                           <img src="<?php echo cchl_legacy_image($post->ID, $inv['logo']);?>" alt="<?php echo $inv['nombre'];?>">
                           <h3><?php echo $inv['nombre'];?></h3>
                           <?php 
                               if($inv['url']):
                                   echo '<a target="_blank" href="'. $inv['url'] .'"><i class="fa fa-external-link"></i></a>';
                               endif;
                           ?>
                           </li>

                                        <?php 
                                        endforeach;
                                        endif;
                                    ?>                
                            </ul>
                <?php 
                    $auspicia = get_post_meta($post->ID, '_cchl_auspicia', true);
                    if($auspicia):?>
                     <h3>Auspicia</h3>
                            <ul class="colabs auspicia invita">
                    <?php 
                        foreach($auspicia as $ausp): ?>
                           
                                   
                                            
                           <li>
                           <img src="<?php echo cchl_legacy_image($post->ID, $ausp['logo']);?>" alt="<?php echo $ausp['nombre'];?>">
                           <h3><?php echo $ausp['nombre'];?></h3>
                           <?php 
                               if($ausp['url']):
                                   echo '<a target="_blank" href="'. $ausp['url'] .'"><i class="fa fa-external-link"></i></a>';
                               endif;
                           ?>
                           </li>

                                        <?php 
                                        endforeach;
                                        endif;
                                    ?>                
                            </ul>
                <?php 
                  $mediaps = get_post_meta($post->ID, '_cchl_media_partner', true);
                  if($mediaps):?>
                  <h3>Mediapartners</h3>
                    <ul class="colabs">
                    <?php 
                    foreach($mediaps as $mediap): ?>

                    
                            
                                    
<li>
<img src="<?php echo cchl_legacy_image($post->ID, $mediap['logo']);?>" alt="<?php echo $mediap['nombre'];?>">
<h3><?php echo $mediap['nombre'];?></h3>
<?php 
    if($mediap['url']):
        echo '<a target="_blank" href="'. $mediap['url'] .'"><i class="fa fa-external-link"></i></a>';
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
                 $ausps = get_post_meta($post->ID, '_cchl_patrocina', true);
                    if($ausps):?>
                    <h3>Patrocinadores</h3>
                                <ul class="colabs">
                    <?php 
                        foreach($ausps as $ausp): ?>
                            
                                        
                                                
                            <li>
                            <img src="<?php echo cchl_legacy_image($post->ID, $ausp['logo']);?>" alt="<?php echo $ausp['nombre'];?>">
                            <h3><?php echo $ausp['nombre'];?></h3>
                            <?php 
                                if($ausp['url']):
                                    echo '<a target="_blank" href="'. $ausp['url'] .'"><i class="fa fa-external-link"></i></a>';
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
                $colabs = get_post_meta($post->ID, '_cchl_colabora', true);
                if($colabs):?>
                <h3>Colaboradores</h3>
                <ul class="colabs">
                <?php
                foreach($colabs as $colab): ?>
                    
                    <li>
                    <img src="<?php echo cchl_legacy_image($post->ID, $colab['logo']);?>" alt="<?php echo $colab['nombre'];?>">
                    <h3><?php echo $colab['nombre'];?></h3>
                    <?php 
                        if($colab['url']):
                            echo '<a target="_blank" href="'. $colab['url'] .'"><i class="fa fa-external-link"></i></a>';
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