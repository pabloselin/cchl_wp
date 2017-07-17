<div class="row catblock">
	<h2 class="catblock-title col-md-2"><?php echo $catblock_title;?></h2>
    <?php 
        $args = array(
            'post_type' => 'post',
            'cat' => $catblock_id
        );
        $catitems = get_posts($args);
        foreach($catitems as $catitem) { ?>

        <div class="catitem col-md-2">
            <a href="<?php echo get_permalink($catitem->ID);?>">
                <h3><?php echo $catitem->post_title;?></h3>
            </a>
        </div>

        <?php }
    ?> 
</div>