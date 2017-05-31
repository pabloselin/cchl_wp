<?php 
    $imagen = get_post_meta($post->ID, 'galeria_imagen_imagen', true);
    $video = get_post_meta($post->ID, 'galeria_video_video', true);
    $prensa = getGroupOrder('link_link');

    if($imagen):
        set_query_var('imagen', $imagen);
        get_template_part('parts/bs-blocks/bs-galeria');
    endif;
    if($video):
        set_query_var('video', $video);
        get_template_part('parts/bs-blocks/bs-video');
    endif;
    if($prensa):
        set_query_var('prensa', $prensa);
        get_template_part('parts/bs-blocks/bs-prensa');
    endif;
?>