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
            
            <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js" type="text/javascript"></script>
			<script type="text/javascript" charset="utf-8">
            $(function () {
                var tabContainers = $('div.tabs2 > div');
                tabContainers.hide().filter(':first').show();
                
                $('div.tabs2 ul.tabNavigation a').click(function () {
                    tabContainers.hide();
                    tabContainers.filter(this.hash).show();
                    $('div.tabs2 ul.tabNavigation a').removeClass('selected');
                    $(this).addClass('selected');
                    return false;
                }).filter(':first').click();
            });
            </script>
			<style>
			ul.tabnavigation li {
				list-style-type:none !important;
				float:left;
			}
			
			ul.tabnavigation {
				list-style: none;
				margin: 0;
				padding: 23px 0;
				clear: both;
				text-align: center;
				list-style-type:none !important;
			}
			ul.tabnavigation li a {
				float: left;
				padding: .5em 1em;
				text-decoration: none;
				color: #A7A9AB;
				margin-top: 5px;
				font-size: 14px;
				text-transform: uppercase;
				background: #E5E6E7;
				margin-left: 7px;
				list-style-type: none !important;
				margin-right: 7px;
				margin-top: 0px;
				height:25px;
				width:auto;
			}
			ul.tabnavigation li a.selected, ul.tabnavigation li a:hover {
				color: white;
				font-size: 14px;
				text-transform: uppercase;
				margin-top: 5px;
				background: #EA6430;
				border: none;
				margin-bottom: 0;
				padding: .5em 1em;
				list-style-type:none !important;
				margin-top: 0px;
			}
			</style>
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
						<?php
                        /*
                        $miembros = getGroupOrder('a-b-c_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('a-b-c_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('a-b-c_link',$miembro).">
							<strong>".get('a-b-c_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('d-e-f_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('d-e-f_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                             <a href=".get('d-e-f_link',$miembro).">
							 <strong>".get('d-e-f_nombre',$miembro)."</strong>
                           	</a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('g-h-i_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('g-h-i_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('g-h-i_link',$miembro).">
							<strong>".get('g-h-i_nombre',$miembro)."</strong>
                           	</a>
                            </div>
                            </li>";
                        }*/
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('j-k-l_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('j-k-l_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('j-k-l_link',$miembro).">
							<strong>".get('j-k-l_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('m-n-o_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('m-n-o_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('m-n-o_link',$miembro).">
							<strong>".get('m-n-o_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('p-q-r_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('p-q-r_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('p-q-r_link',$miembro).">
							<strong>".get('p-q-r_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('s-t-u_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('s-t-u_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('s-t-u_link',$miembro).">
							<strong>".get('s-t-u_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('v-w-x_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('v-w-x_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('v-w-x_link',$miembro).">
							<strong>".get('v-w-x_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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
						<?php
                        /*
                        $miembros = getGroupOrder('y-z_imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 80, "w" => 80, "zc" => 1, "q" => 100);
                            echo get_image('y-z_imagen',$miembro,1,1,NULL);
                            echo "<div class='texto'>
                            <a href=".get('y-z_link',$miembro).">
							<strong>".get('y-z_nombre',$miembro)."</strong>
                            </a>
                            </div>
                            </li>";
                        }
                        */
                        ?>
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