<div class="row">
<?php 
$postid = cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
// $tax = get_post_meta($postid, 'cchl_bstax', true); 
// var_dump($postid);
$args = array(
  'numberposts' => 10,
  'post_type' => 'post',
  'tax_query' => array(
    array(
      'taxonomy' => 'ferias',
      'field' => 'slug',
      'terms' => 'fil-vina-2018' 
    )
  )
);
$noticias = get_posts($args);


foreach($noticias as $noticia_home):
  $imgthid = get_post_thumbnail_id( $noticia_home->ID );
$imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-secundaria' );
?>
              <div class="col-md-4"><div class="item-related-noticia">
                <a href="<?php echo get_permalink($noticia_home->ID);?>">
                  <img src="<?php echo $imgsrc[0];?>" alt="<?php echo $noticia_home->title;?>">
                  <div class="txt">
                    <h3><?php echo $noticia_home->post_title;?></h3>
                    <?php echo get_the_date( '', $noticia_home->ID );?>
                  </div>
                </a>
              </div>
              </div><?php
endforeach;
?>

</div>
