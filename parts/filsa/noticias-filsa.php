 <?php if(is_page(31817) || is_page(108)):?>
    
            <div class="intro-filsa">
                
                <h2>NOTICIAS FILSA</h2>
                <div class="noticias-filsa">
                    <?php 
                        $args = array(
                                'numberposts' => 12,
                                'cat' => 130
                                );
                        $notfilsa = get_posts($args);
                        if($notfilsa):
                            foreach($notfilsa as $key => $nfilsa){?>
                                <?php 
                                if($key == 0 || $key % 3 == 0):
                                        echo '<div class="page">';
                                endif;
                                        $bg = '';
                                         ?>
                                 <div class="mininoticia">
                                 <?php 
                                    if($nfilsa->post_content):
                                 ?>
                                 <a href="<?php echo add_query_arg('ref', 'filsa2014', get_permalink($nfilsa->ID));?>" <?php if($bg): echo $bg; endif;?> >
                                 <span class="minioverlay"></span>
                                     <div class="innermini">
                                         
                                         <!-- <span class="date"><?php echo mysql2date( 'l j \d\e F', $nfilsa->post_date, true );?></span> -->
                                         <h3><?php echo $nfilsa->post_title;?></h3>
                                         <i class="fa fa-plus"></i>
                                         
                                     </div>
                                     </a>
                                    <?php else:?>
                                    <div class="nota">
                                        <span class="minioverlay"></span>
                                        <span class="aviso">AVISO:</span>
                                         <div class="innermini">
                                             
                                             <!-- <span class="date"><?php echo mysql2date( 'l j \d\e F', $nfilsa->post_date, true );?></span> -->
                                             <p><?php echo limitar_palabras($nfilsa->post_title, 22, '...');?></p>
                                             
                                         </div>
                                    </div>
                                    <?php endif;?>
                                 </div>

                            <?php 
                                if( ($key + 1) % 3 == 0 || $key == count($notfilsa) - 1 ):
                                    echo '</div>';
                                endif;
                            }
                        endif;
                    ?>
                </div>
                <div id="notfilsapager"></div>

                <div class="morefilsa"><a href="<?php echo get_category_link( 130 );?>"><i class="fa fa-plus"></i> Ver más noticias FILSA</a></div><br><br>
 
                
        
    <?php endif;?>