<div class="invitados-filsa">
                    <ul class="cf listado">
                        <?php
                        $miembros = getGroupOrder('imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 285, "w" => 250, "zc" => 1, "q" => 100);
                            echo get_image('imagen',$miembro,1,1,NULL,$otros);
                            echo "<div class='info'>
                            <h3>".get('nombre',$miembro)."</h3>
                            <span>".get('cargo',$miembro)."</span>";
                            echo '<div class="textoint">'. apply_filters('the_content', get('texto',$miembro)). '</div>
                            </div>
                            </li>';
                        }
                        ?>
                        </ul>
                    </div>