<?php
/*
Template Name: Plantilla Feria 2018 
 */
?>

<?php get_header('bs-ferias-nuevo'); ?>
<?php 
// Custom Fields
$postid = cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
$toppost = get_post($postid);
$menuferia = get_post_meta($postid, 'cchl_bsmenuferia', true);
$page_evts = get_post_meta($postid, 'cchl_bspageevents', true);
$colaboradores = get_post_meta( $postid, 'cchl_bspagecolabs', true );
$noticias = get_post_meta( $postid, 'cchl_bspagenews', true);
$expositores = get_post_meta( $postid, 'cchl_bspageexpositores', true);
//var_dump($colaboradores);
$argsmenu = array(
  'menu' => $menuferia,
  'menu_class' => 'nav'
);
$isnews = (get_post_type() == 'post')? true : false;
if($isnews):
  $colwidth = 'col-md-8 single-noticia-feria';
else:
$colwidth = 'col-md-10 col-md-offset-1';
endif;
$cchl_options = get_option( 'cchl_settings' );
?>

<div class="container">
    <div class="row">
    <div class="content-feria <?php echo $colwidth;?>">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                <?php if($isnews):?>
                     <span class="date"><?php the_date();?></span>
                <?php endif;?>
                <h1 class="post-title"><?php the_title();?></h1>
                <?php if($isnews):?>
                      <div class="ft-img-wrapper"> <?php the_post_thumbnail('noticia_principal');?> </div>
                <?php endif;?>
                <div class="text-content">

                     <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <?php the_content();?>

<?php if($colaboradores == $post->ID):
  get_template_part('parts/bs-blocks/bs-colaboradores');
endif;?>

                </div>

<?php endwhile;
endif;?>

<?php if( get_the_ID() == $page_evts) {
get_template_part('parts/blocks/bs-nuevo-programa-cultural-ferias');
}?>

<?php if(get_the_ID() == $noticias) {
get_template_part('parts/bs-blocks/bs-nuevas-noticias-ferias');
};?>

<?php if(get_the_ID() == $expositores) {
get_template_part('parts/bs-blocks/bs-expositores');
};?>

        </div>
      <?php if($isnews):?>
          <div class="aside-feria-extras col-md-4">
<?php 
$args = array(
  'numberposts' => 4,
  'post_type' => 'post',
  'tax_query' => array(
    array(
      'taxonomy' => 'ferias',
      'field' => 'slug',
      'terms' => 'fil-vina-2018' 
    )
  )
);
$noticias_home = get_posts($args);

global $post;
$previds = [];
if($noticias_home):

  echo '<h2>Más noticias</h2>';

foreach($noticias_home as $noticia_home):
  if($noticia_home->ID != $post->ID):
    $previds[] = $noticia_home->ID;
$imgthid = get_post_thumbnail_id( $noticia_home->ID );
$imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-secundaria' );
?>
              <div class="item-related-noticia">
                <a href="<?php echo get_permalink($noticia_home->ID);?>">
                  <img src="<?php echo $imgsrc[0];?>" alt="<?php echo $noticia_home->post_title;?>">
                  <div class="txt">
                    <h3><?php echo $noticia_home->post_title;?></h3>
                    <?php echo get_the_date( '', $noticia_home->ID );?>
                  </div>
                </a>
              </div>
<?php
endif;//duplicated post id
endforeach;
endif;//if noticias home
?>
          </div>
      <?php endif;?>
    </div>





</div>

<?php get_template_part('parts/bs-footer-ferias-nuevo'); ?>
