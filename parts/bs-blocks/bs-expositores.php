<div class="expositores-feria-std row">
<?php 
  $args = array(
    'post_type' => 'tribe_organizer',
    'numberposts' => -1,
    'orderby' => 'post_title',
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'ferias',
        'field' => 'slug',
        'terms' => 'fil-vina-2018'
      )
    )
  );
  $expositores = get_posts($args);
  foreach($expositores as $expositor):
  $location = get_post_meta($expositor->ID, 'cchl_location', true);
  ?>
<div class="col-md-6">
    <div class="expositor-item">
        <h4><?php echo $expositor->post_title;?></h4>
        <?php if($location):?>
        <p class="ubicacion"><span class="label label-info">Stand <?php echo $location;?></span></p>
        <?php endif;?>
    </div>
</div>
<?php
    endforeach;
?>
</div>
