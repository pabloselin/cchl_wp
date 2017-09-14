<?php

// $kitprensa = getGroupOrder('kit_de_prensa_archivo');
// $enlosmedios = getGroupOrder('link_link');
$kitprensa = get_post_meta($post->ID, 'kit_de_prensa_archivo', true);
$enlosmedios = get_post_meta($post->ID, '_cchl_link', true);

if($kitprensa):
        set_query_var('kitprensa', $kitprensa);
        get_template_part('parts/bs-blocks/bs-kit-de-prensa');
endif;
if($enlosmedios):
    set_query_var('enlosmedios', $enlosmedios);
    get_template_part('parts/bs-blocks/bs-en-los-medios');
endif;
?>