<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title();?></title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head();?>
</head>
<?php 
    $cchl_options = get_option( 'cchl_settings' );
    $postid = cchl_current_fields_id('bs-plantilla-feria.php');
    $header_lg = get_post_meta($postid, 'cchl_bsferiaheader_lg', true);
    $header_sm = get_post_meta($postid, 'cchl_bsferiaheader_sm', true);
?>
<body <?php body_class();?>>
<?php get_template_part( 'parts/fb-sdk');?>


<header class="site-header">
        <?php get_template_part('parts/bs-general/bs-utilbar-ferias');?>

       <div class="container nopad">
            <div class="row">
               <div class="col-md-12">
                   <img class="banner-feria-md hidden-sm hidden-xs" src="<?php echo $header_lg;?>" alt="<?php echo get_the_title($postid);?>">
                   <img class="banner-feria-sm visible-sm visible-xs" src="<?php echo $header_sm;?>" alt="<?php echo get_the_title($postid);?>">
               </div>
           </div>
       </div>

</header>
