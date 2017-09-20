<div class="listado">
                <ul class="cf">
                <?php
                $image = cchl_legacy_image($post->ID, $miembro['imagen']);
                $miembros = get_post_meta($post->ID, '_cchl_listado_personas', true);
                foreach($miembros as $miembro){
                    echo "<li>";
                    echo '<img src="' . cchl_legacy_image($post->ID, $miembro['imagen']) . '" alt="' . $miembro['nombre'] . '">';
                    echo "<div class='info'>
                    <h3>".$miembro['nombre']."</h3>
                    <span>".$miembro['cargo']."</span>";
                    echo '<div class="textoint">'. apply_filters('the_content', $miembro['texto']). '</div>
                    </div>
                    </li>';
                }
                ?>
                </ul>
                </div>