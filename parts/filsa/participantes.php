<div id="presidentes">
        <ul class="cf">
            <?php
            $miembros = getGroupOrder('imagen');
            if($miembros):
            foreach($miembros as $miembro){
                echo "<li>";
                $otros = array("h" => 95, "w" => 95, "zc" => 1, "q" => 100);
                echo get_image('imagen',$miembro,1,1,NULL,$otros);
                echo "<div class='info'>
                <h3>".get('nombre',$miembro)."</h3>
                <span>".get('cargo',$miembro)."</span>";
                echo '<div class="textoint">'. apply_filters('the_content', get('texto',$miembro)). '</div>
                </div>
                </li>';
            }
            endif;
            ?>
            </ul>
            </div>