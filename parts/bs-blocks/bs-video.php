<div class="video-single">

<?php
    xdebug_break();
    foreach($video as $key=>$viditem){
	
	$id = uniqid('yt');
	$idvid = $viditem['video'];
	?>
                        <!--<a class="fl-media" data-featherlight="#ytvid-<?php echo $id;?>">
                            <img src="https://img.youtube.com/vi/<?php echo getYoutubeID($idvid);?>/0.jpg" width="150" height="115" />
                        </a>-->
                        
                        <iframe width="560" height="315" id="ytvid-<?php echo $id;?>" class="fl-lightbox" src="//youtube.com/embed/<?php echo getYoutubeID($idvid);?>" frameborder="0" allowfullscreen></iframe>
                    <?php }?>
</div>
