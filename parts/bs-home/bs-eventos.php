<?php 

  $eventos_home = cchl_getmenus('eventos-destacados-portada');

?>

<?php if($eventos_home):?>


<section class="eventos">
    <div class="container">
        <div class="eventos row">
            
            <?php foreach($eventos_home as $key=>$evento_home):
            
                if($key < 3):
                
                    echo render_mustache_event( $evento_home->object_id, 'evento-mini-home');

                endif;
            
            endforeach;?>
        
        </div>
    </div>
</section>

<?php endif;?>