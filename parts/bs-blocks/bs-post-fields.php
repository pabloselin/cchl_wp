<?php 
    $multimedias = get_post_meta($post->ID, '_cchl_multimedia', true);
    $prensa = get_post_meta($post->ID, '_cchl_link', true);
    
    foreach($multimedias as $multimedia) {
        // //xdebug_break();
        if($multimedia['galeria']):
            set_query_var('imagen', $multimedias);
            get_template_part('parts/bs-blocks/bs-galeria');
        endif;
        if($multimedia['video']):
            set_query_var('video', $multimedias);
            get_template_part('parts/bs-blocks/bs-video');
        endif;
    }
    
    if($prensa):
        set_query_var('prensa', $prensa);
        get_template_part('parts/bs-blocks/bs-prensa');
    endif;
?>