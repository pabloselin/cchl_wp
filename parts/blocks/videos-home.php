<div class="video-home">

    <div>
        <?php $i = 1; ?>
        <div>

            <?php 
            $args = array(
                'category_name' => 'multimedia',
                'post_type' => 'post',
                'numberposts' => 1
                );
            $videos = get_posts($args);

            foreach($videos as $video) {

                $video_field = get_post_meta($video->ID, 'galeria_video_video', true);

                ?>

                <iframe width="600" height="300" src="//www.youtube.com/embed/<?php echo getYoutubeID($video_field); ?>" frameborder="0" allowfullscreen></iframe>

                <?php
            }

            ?>
        </div>
    </div>

</div>