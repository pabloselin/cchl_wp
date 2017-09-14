<div class="link_prensa nomf">
 <?php
    foreach($enlosmedios as $link){ ?> 
        <p>
        <a href="<?php echo $link['url']; ?>" target="_blank"><i class="fa fa-external-link"></i> 
        <strong>Fuente:</strong> <?php echo $link['descripcion']; ?></a>
        </p>
    <?php } ?>   
</div> 