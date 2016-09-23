<?php
/* Template Name: Listado de Socios */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="content" class=" grid_16">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
			<div class="cf"></div>
            <div class="the-content"><?php the_content();?></div>
            
            <?php endwhile; endif; wp_reset_query(); ?>
            <div class="tabs2 cf">
                <ul class="tabNavigation">
                    <li><a href="#a-b-c">a-b-c</a></li>
                    <li><a href="#d-e-f">d-e-f</a></li>
                    <li><a href="#g-h-i">g-h-i</a></li>
                    <li><a href="#j-k-l">j-k-l</a></li>
                    <li><a href="#m-n-o">m-n-o</a></li>
                    <li><a href="#p-q-r">p-q-r</a></li>
                    <li><a href="#s-t-u">s-t-u</a></li>
                    <li><a href="#v-w-x">v-w-x</a></li>
                    <li><a href="#y-z">y-z</a></li>
                </ul>
                <div id="a-b-c">
                    <ul class="socios">
					
                        <?php query_posts("category_name=a-b-c&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
                <div id="d-e-f">
                    <div class="socios">
						
                        <?php query_posts("category_name=d-e-f&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="g-h-i">
                    <div class="socios">
						
                        <?php query_posts("category_name=g-h-i&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="j-k-l">
                    <div class="socios">
						
                        <?php query_posts("category_name=j-k-l&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="m-n-o">
                    <div class="socios">
						
                        <?php query_posts("category_name=m-n-o&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="p-q-r">
                    <div class="socios">
						
                        <?php query_posts("category_name=p-q-r&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="s-t-u">
                    <div class="socios">
						
                        <?php query_posts("category_name=s-t-u&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="v-w-x">
                    <div class="socios">
						
                        <?php query_posts("category_name=v-w-x&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div id="y-z">
                    <div class="socios">
						
                        <?php query_posts("category_name=y-z&showposts=-1&orderby=name"); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('imagen-80'); ?>
                            <div class="texto">
                                <a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php get_footer(); ?>