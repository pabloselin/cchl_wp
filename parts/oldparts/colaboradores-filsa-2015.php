
                <?php 
                $invita = get_post_meta($post->ID, '_cchl_invita', true);
                if($invita):
                ?>
                <h3 class="colabheading">Invita</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($invita as $inv): ?>
                                    
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
                <h3 class="colabheading">Colaboradores</h3>
                    
                            <?php 
                                $colabs = get_post_meta($post->ID, '_cchl_colabora', true);
                                foreach($colabs as $key=>$colab): 
                                    if($key == 0):?>
                                        <ul class="colabs aups">
                                        <li>
                                            <img src="<?php echo cchl_legacy_image($colab['logo']);?>" alt="<?php echo $colab['nombre'];?>">
                                            <h3><?php echo $colab['nombre'];?></h3>
                                            <?php 
                                                if($colab['url']):
                                                    echo '<a target="_blank" href="'. $colab['url'] .'"><i class="fa fa-external-link"></i></a>';
                                                endif;
                                            ?>
                                        </li>
                                        </ul>
                                        <ul class="colabs">
                                    <?php
                                        else: 
                                        ?>
                                                    
                                                    <li>
                                                    <img src="<?php echo cchl_legacy_image($colab['logo']);?>" alt="<?php echo $colab['nombre'];?>">
                                                    <h3><?php echo $colab['nombre'];?></h3>
                                                    <?php 
                                                        if($colab['url']):
                                                            echo '<a target="_blank" href="'. $colab['url'] .'"><i class="fa fa-external-link"></i></a>';
                                                        endif;
                                                    ?>
                                                </li>

                                <?php 
                                    endif;
                                endforeach;
                            ?>                
                    </ul>
