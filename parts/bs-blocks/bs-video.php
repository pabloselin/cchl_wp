<div class="video-single">

<?php
    $videos = getGroupOrder('galeria_video_video');
foreach($videos as $key=>$video){
	
	$id = uniqid('yt');
	$otros = get("galeria_video_video",$video);
	?>
                        <a class="fl-media" data-featherlight="#ytvid-<?php echo $id;?>">
                            <img src="https://img.youtube.com/vi/<?php echo getYoutubeID($otros);?>/0.jpg" width="150" height="115" />
                        </a>
                        <iframe width="560" height="315" id="ytvid-<?php echo $id;?>" class="fl-lightbox" src="//youtube.com/embed/<?php echo getYoutubeID($otros);?>" frameborder="0" allowfullscreen></iframe>
                    <?php }?>
</div>
