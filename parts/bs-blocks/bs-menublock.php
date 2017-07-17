<div class="row menublock">
	<h2 class="menublock-title col-md-2"><?php echo $menublock_title;?></h2>
    <?php 
        $menublockitems = cchl_getmenus($menu);
        foreach($menublockitems as $menublockitem) {
             ?>

        <div class="menublock-item col-md-2">
            <a href="<?php echo $menublockitem->url;?>">
                <h3><?php echo $menublockitem->title;?></h3>
            </a>
        </div>

        <?php }
    ?> 
</div>