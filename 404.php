<?php 
/*
Template Name: Página No encontrada
*/
?>
<?php get_header();?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
        <div class="row">        
                <div class="col-md-8 col-md-offset-2">

                 <article class="page not-found">
                    <header>
                        <h1>404: No encontrado</h1>
                    </header>

                    <div class="article-content text-content">
                        
                        <?php do_action('cchl_beforecontent');?>

                        <p>Contenido no encontrado</p>
                        <p>¿Quizás quieras buscar algún contenido?</p>
                        <p><?php echo get_search_form(  );?></p>
                        <p>O puedes <a href="<?php echo get_bloginfo('url');?>">volver a la portada</a></p>

                        <?php do_action('cchl_aftercontent');?>
                        
                    </div>
                </article>

                
                </div>

    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>