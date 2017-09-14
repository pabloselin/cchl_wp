
        <?php 

                    $grupocolaboradores = array(
                                        '_cchl_organiza'              => 'Organiza',
                                        '_cchl_produce'               => 'Produce',
                                        '_cchl_apoya'                 => 'Apoya',
                                        '_cchl_participa'             => 'Participa',
                                        '_cchl_media_partner'         => 'Media Partner',
                                        '_cchl_colabora'              => 'Colabora',     
                                        '_cchl_patrocina'             => 'Patrocina',
                                        '_cchl_participan_programa'   => 'Participan en programa cultural'
                                     );

                    foreach($grupocolaboradores as $keyname => $grupocolaborador) {
                        $idx = 0;
                        $itemsgrupo = get_post_meta($post->ID, $keyname, true );
                        
                        echo '<h3 class="colabheading">' . $grupocolaborador . '</h3>';
                        
                        echo '<ul class="colab">';

                        foreach($itemsgrupo as $item) {
                            
                            ?>

                            
                                <li class="colab-<?php echo $idx++;?>">

                                    <img src="<?php echo cchl_legacy_image($item['logo']);?>" alt="<?php echo $item['nombre'];?>">

                                    <h3><?php echo $item['nombre'];?></h3>

                                    <?php if($item['url']):?>

                                        <a target="_blank" href="<?php echo $item['url'];?>"><i class="fa fa-external-link"></i></a>

                                    <?php endif;?>

                                </li>
                            

                            <?php
                            
                        }

                        echo "</ul>";

                    }
                
                ?>
                