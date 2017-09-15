<div class="listado">
        <ul class="cf">
            <?php
            $miembros = get_post_meta($post->ID, '_cchl_listadopersonas', true);
            if($miembros):
            foreach($miembros as $miembro){
                echo "<li>";
                echo '<img src="' . cchl_legacy_image($post->ID, $miembro['imagen']) . '">';
                echo "<div class='info'>";
                echo '<h3>' . $miembro['nombre']. ' </h3>';
                echo '<span>'  . $miembro['cargo']. '</span>';
                echo '<div class="textoint">'. apply_filters('the_content', $miembro['texto']). '</div>
                </div>
                </li>';
            }
            endif;
            ?>
            </ul>
            </div>