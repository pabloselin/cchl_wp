<?php 

                    $grupocolaboradores = array(
                                        'organiza'              => 'Organiza',
                                        'produce'               => 'Produce',
                                        'apoya'                 => 'Apoya',
                                        'participa'             => 'Participa',
                                        'media_partner'         => 'Media Partner',
                                        'colabora'              => 'Colabora',     
                                        'patrocina'             => 'Patrocina',
                                        'participan_programa'   => 'Participan en programa cultural'
                                     );

                    foreach($grupocolaboradores as $keyname => $grupocolaborador) {
                        $idx = 0;
                        $itemsgrupo = getGroupOrder( $keyname . '_logo' );
                        
                        echo '<h3 class="colabheading">' . $grupocolaborador . '</h3>';
                        
                        echo '<ul class="colab">';

                        foreach($itemsgrupo as $item) {
                            
                            ?>

                            
                                <li class="colab-<?php echo $idx++;?>">

                                    <?php echo get_image( $keyname . '_logo', $item );?>

                                    <h3><?php echo get( $keyname . '_nombre', $item );?></h3>

                                    <?php if(get( $keyname . '_url', $item )):?>

                                        <a target="_blank" href="<?php echo get( $keyname . '_url', $item );?>"><i class="fa fa-external-link"></i></a>

                                    <?php endif;?>

                                </li>
                            

                            <?php
                            
                        }

                        echo '</ul>';

                    }
                
                ?>