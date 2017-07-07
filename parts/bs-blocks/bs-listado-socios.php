<div class="col-md-4 bs-related">
<h2>Socios <br> Cámara Chilena del Libro</h2>
<div class="listado-socios-scroll">
    <?php 
        $args = array(
            'numberposts' => -1,
            'post_type' => 'socios',
            'orderby' => 'post_title',
            'order' => 'ASC'
        );
        $socios = get_posts($args);

        foreach($socios as $socio):?>

            <p>
                <a class="socio" href="<?php echo get_permalink($socio->ID);?>"><?php echo substr($socio->post_title, 0, 48);?></a>
            </p>

        <?php 
        endforeach;
   ?> 
</div> 

</div>