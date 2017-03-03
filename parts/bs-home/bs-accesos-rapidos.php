    <?php 
      $menurapidos = cchl_getmenus('accesos-rapidos-home');
    ?>
    <div class="accesos col-md-4">
        <div class="list-group">

          <?php foreach($menurapidos as $item_acceso):?>

          <a href="<?php echo $item_acceso->url;?>" class="list-group-item">
            <i class="fa fa-fw fa-3x <?php echo $item_acceso->classes[0];?> pull-left"></i>
            <h4 class="list-group-item-heading"><?php echo $item_acceso->title;?></h4>
          </a>

          <?php endforeach;?>

        </div>

    </div>