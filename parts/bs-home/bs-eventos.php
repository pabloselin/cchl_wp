<?php 

  $eventos_home = cchl_getmenus('eventos-destacados-portada');
  $cchl_options = get_option('cchl_settings');

?>

<?php if($eventos_home):?>


<section class="eventos">
    <div class="container">

        <div class="row">
            <h1 class="home-section-title"><?php echo $cchl_options['cchl_tituloseccioneventos'];?></h1>
        </div>

        <div class="eventos row">
            
            <?php foreach($eventos_home as $key=>$evento_home):
            
                if($key < 3):
                
                    echo render_mustache_event( $evento_home->object_id, 'evento-mini-home');

                endif;
            
            endforeach;?>
        
        </div>
        <div class="row plus-row">
            <div class="col-md-4 col-md-offset-4">
                <a href="<?php echo $cchl_options['cchl_urlseccioneventos'];?>" class="btn btn-block btn-warning"> <i class="fa fa-plus"></i> Eventos </a>
            </div>
        </div>
    </div>
</section>

<?php endif;?>