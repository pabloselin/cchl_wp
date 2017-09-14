<div class="galeria-imagenes">
    <?php
    $galerias = get_post_meta($post->ID, '_cchl_multimedia', true);
        foreach($galerias as $galeria){ 
            echo do_shortcode($galeria['galeria']);
		    }?>
</div>