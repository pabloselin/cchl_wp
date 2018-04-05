<div class="bs-eventos">
    <h2 class="programa-header">Programación</h2>
        <?php 
                $postid = cchl_current_fields_id('templates/bs-plantilla-feria.php');
                $page_evts = get_post_meta($postid, 'cchl_bspageevents', true);
                $meses = array(
                    'enero' => 1,
                    'febrero' => 2,
                    'marzo' => 3,
                    'abril' => 4,
                    'mayo' => 5,
                    'junio' => 6,
                    'julio' => 7,
                    'agosto' => 8,
                    'septiembre' => 9,
                    'octubre' => 10,
                    'noviembre' => 11,
                    'diciembre' => 12
                );
                ?>
                
                    
                    <?php 
                
                        $args = array(
                                'post_parent' => $page_evts,
                                'post_type' => 'page',
                                'numberposts' => -1,
                                'post_status' => 'any'
                            );
                        $dias = get_children($args);
                
                        foreach($dias as $dia) {
                            //echo $dia->ID . '<br>';
                
                            $info = explode(' ', $dia->post_title);
                
                            $pagsfil[$info[1]] = array(
                                'id' => $dia->ID,
                                'ndia' => $info[1],
                                'mes' => $info[3],
                                'dia' => $info[0],
                                'dcode' => '2017-' . $meses[$info[3]] . '-' . $info[1]
                                );
                        }
                
                        $pagsfil = array_reverse($pagsfil);
                
                    ?>
                
                
                <div class="tabdias tabgen active" id="diaseventos">
                    <ul id="navfilsa" class="navfil">
                    
                    </ul>	
                    <ul class="calendario-filsa">
                    
                    <?php
                    foreach($pagsfil as $day) {
                        $page = get_post($day['id']);
                        $hoy = date('j');
                        
                        if($hoy == $day['ndia']) {
                            $cur = 'hoy';
                        } else {
                            $cur = 'normal';	
                        }
                        $dia = $day['dia'];
                        $ndia = $day['ndia'];
                        $mes = $day['mes'];
                        
                    ?>
                    <li class="dia coneventos <?php echo $cur;?>" data-dia="<?php echo $dia;?>" data-ndia="<?php echo $ndia;?>" data-mes="<?php echo $mes;?>">
                        <div class="fil-day-content">
                            <h3><?php echo $page->post_title;?></h3>
                            <?php echo apply_filters( 'the_content', $page->post_content );?>
                        </div>
                    </li>
                    <?php };?>
                    </ul>
                </div>
</div>