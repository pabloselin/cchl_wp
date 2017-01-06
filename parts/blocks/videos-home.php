<?php

$miembros = getGroupOrder('galeria_video_video');
foreach(array_reverse($miembros) as $miembro){
	$otros = get("galeria_video_video",$miembro); ?>
	<?php if($otros!="" && $i<5){ ?>
	<div id="vid-<?php echo $post->ID;?>">
		<iframe width="600" height="300" src="//www.youtube.com/embed/<?php echo getYoutubeID($otros); ?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<?php $i++; } 
	?>