<div class="link_prensa">
 <?php
    foreach($enlosmedios as $link){ ?> 
        <p>
        <a href="<?php echo get('link_link',$link); ?>" target="_blank"><i class="fa fa-external-link"></i> 
        <strong>Fuente:</strong> <?php echo get('link_descripcion',$link); ?></a>
        </p>
    <?php } ?>   
</div> 