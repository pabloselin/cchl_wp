<?php 
//automenu ferias

//tiene que ser hijo de alguna de las 3 páginas principales
$parents = get_post_ancestors( $post->ID );
$ferias = array(CCHL_FERIASCOMUNALES, CCHL_FERIASREGIONALES, CCHL_FERIASEXTRANJERO);

foreach($ferias as $key=>$feria) {
	$args = array(
		'post_parent' => $feria,
		'post_type' => 'page'
		);
	$children = get_posts( $args );
	if($children):
		$output[$key] = '<ul class="children">';
		foreach($children as $child):
			$output[$key] .= '<li><a href="' . get_permalink($child->ID) . '">' . get_the_title($child->ID) .'</a></li>';
		endforeach;
		$output[$key] .= '</ul>';
	endif;	
}

?>
<ul>
	<?php
	foreach($ferias as $key=>$feria):
		
			echo '<li class="current_page_item"><a href="' . get_permalink($feria) . '">' . get_the_title($feria) . '</a>';
			echo $output[$key];
			echo '</li>';

	endforeach;
	?>
</ul>