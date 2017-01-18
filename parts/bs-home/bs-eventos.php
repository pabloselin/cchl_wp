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
        <div class="row plus-row">
            <div class="col-md-4 col-md-offset-8">
                <a href="#" class="btn btn-block btn-info"> <i class="fa fa-plus"></i> Eventos </a>
            </div>
        </div>
    </div>
</section>

<?php endif;?>