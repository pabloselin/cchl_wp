<?php
if(is_page(12) || get_topmost_parent($post->ID) ==12){
	if(!$post->post_parent){
        // will display the subpages of this top level page
        $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
    }
    else{
        if($post->ancestors) {
            // now you can get the the top ID of this page
            // wp is putting the ids DESC, thats why the top level ID is the last one
            $ancestors = end($post->ancestors);
            $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
        }
    }
    
    if ($children) { ?>
        <ul>
            <?php echo $children; ?>
            <li><a href="<?php bloginfo('url'); ?>/socios/">Socios</a></li>
        </ul>
	<?php } ?>
    
    
<?php }
elseif(is_page(48) || get_topmost_parent($post->ID) == 48 || $post->post_parent == 48) {
	?>
   
    
    
        <ul class="menu">
          
             <li><a href="/agencia-isbn/que-es/">Qué es</a></li>
             <li><a href="/agencia-isbn/como-solicitar/">Cómo solicitar</a></li>
             <li><a href="/agencia-isbn/preguntas-frecuentes/">Preguntas frecuentes</a></li>
                        <li><a href="http://www.isbnchile.cl/site_isbn/login.php">Registre aquí</a></li>
  			   <li><a href="http://www.isbnchile.cl/site_isbn/buscador.php">Buscador de títulos</a></li>
  
             <li><a href="/agencia-isbn/estadisticas/">Estadísticas</a></li>
              <li><a href="/agencia-isbn/isbn-contacto/">Contacto</a></li>       
          
        </ul>
	
    
    
<?php }
elseif(is_page(727) || get_topmost_parent($post->ID) == 727){?>
	<ul>
		<?php wp_list_categories('title_li=&child_of=24&orderby=id'); ?>
    </ul>
<?php }
elseif(is_page(25) || get_topmost_parent($post->ID) == 25){
	if(!$post->post_parent){
        // will display the subpages of this top level page
        $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
    }
    else{
        if($post->ancestors) {
            // now you can get the the top ID of this page
            // wp is putting the ids DESC, thats why the top level ID is the last one
            $ancestors = end($post->ancestors);
            $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
        }
    }
    
    if ($children) { ?>
        <ul class="menu">
            <?php echo $children; ?>
            <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/">Capacitación</a>
                <ul class="children">
                      <li><a href="<?php bloginfo('url'); ?>/eventos/category/agenda/-capacitacion">Agenda</a></li>
                     
                      <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/seminarios/">Seminarios</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/talleres/">Talleres</a></li>
                </ul>
            </li>
            <li><a href="<?php bloginfo('url'); ?>/categoria/bolsa-de-trabajo">Bolsa de trabajo</a></li>
        </ul>
	<?php } ?>
<?php }
elseif(is_category_or_sub(8) || is_category(119)) { ?>

<?php /* <h1 id="titulo-cat">Capacitación</h1> */?>
<?php
query_posts('page_id=25');
if ( have_posts() ) : while ( have_posts() ) : the_post();
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
}


else{
	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
	}
}

if ($children) { ?>
	<ul class="menu">
		<?php echo $children; ?>
		<li class="current_page_item"><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/">Capacitación</a>
			<ul class="children">
				  <li><a href="<?php bloginfo('url'); ?>/eventos/category/agenda/-capacitacion">Agenda</a></li>
                     
                      <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/seminarios/">Seminarios</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/categoria/capacitacion/talleres/">Talleres</a></li>
			</ul>
		</li>
	</ul>
<?php } endwhile;endif;wp_reset_query(); ?>
<?php }
elseif(is_page(41) || get_topmost_parent($post->ID) ==41 || is_category('events') || is_category('prensa-filsa')){ ?>
	
	<?php wp_nav_menu( array('menu' => 'menu-ferias' )); ?>
<?php }
elseif(is_category_or_sub(4) || is_category(16)) { ?>
	<ul>
		<?php wp_list_categories('title_li=&child_of=4&exclude=1&order=DESC'); ?>
	</ul>
  
<?php }
elseif(is_category_or_sub(51)) { ?>
	 <ul>
		<?php wp_list_categories('title_li=&child_of=51&exclude=1'); ?>
	</ul>

<?php
}
elseif(is_page(45) || $post->post_parent == (45) || is_category_or_sub(68) || is_category_or_sub(104)){
query_posts('page_id=45');
if ( have_posts() ) : while ( have_posts() ) : the_post();
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
}
else{
	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
	}
}

if ($children) { ?>
	<ul class="menu">
    	<li><a href="<?php bloginfo('url'); ?>/categoria/socios/beneficios/">Beneficios</a>
			<ul class="children">
				<?php wp_list_categories('title_li=&child_of=32&exclude=1'); ?>
			</ul>
		</li>
		<?php echo $children; ?>
		<li><a href="<?php bloginfo('url'); ?>/categoria/socios/noticias-socios/">Noticias para socios</a>
			<!--<ul class="children">
				<?php wp_list_categories('title_li=&child_of=21&exclude=1'); ?>
			</ul>-->
		</li>
	</ul>
<?php } endwhile;endif;wp_reset_query();
}
elseif(is_category_or_sub(21)) { ?>

<?php
query_posts('page_id=45');
if ( have_posts() ) : while ( have_posts() ) : the_post();
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
}
else{
	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
	}
}

if ($children) { ?>
	<ul class="menu">
    	<li><a href="<?php bloginfo('url'); ?>/categoria/socios/beneficios/">Beneficios</a>
			<!--<ul class="children">
				<?php wp_list_categories('title_li=&child_of=32&exclude=1'); ?>
			</ul>-->
		</li>
		<?php echo $children; ?>
		<li class="current_page_item"><a href="<?php bloginfo('url'); ?>/categoria/socios/noticias-socios/">Noticias para socios</a>
			<!--<ul class="children">
				<?php wp_list_categories('title_li=&child_of=21&exclude=1'); ?>
			</ul>-->
		</li>
	</ul>
<?php } endwhile;endif;wp_reset_query(); ?>
<?php } elseif(is_category_or_sub(32)) { ?>

<?php /* <h1 id="titulo-cat">Capacitación</h1> */?>
<?php
query_posts('page_id=45');
if ( have_posts() ) : while ( have_posts() ) : the_post();
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
}
else{
	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
	}
}

if ($children) { ?>
	<ul class="menu">
    	<li class="current_page_item"><a href="<?php bloginfo('url'); ?>/categoria/socios/beneficios/">Beneficios</a>
			<!--<ul class="children">
				<?php wp_list_categories('title_li=&child_of=32&exclude=1'); ?>
			</ul>-->
		</li>
		<?php echo $children; ?>
		<li><a href="<?php bloginfo('url'); ?>/categoria/socios/noticias-socios/">Noticias para socios</a>
			<!--<ul class="children">
				<?php wp_list_categories('title_li=&child_of=21&exclude=1'); ?>
			</ul>-->
		</li>
	</ul>
<?php } endwhile;endif;wp_reset_query(); ?>
<?php }
elseif(is_page(404) || $post->post_parent == (404)){
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
}
else{
	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
	}
}

if ($children) { ?>
	<ul class="menu">
		<?php echo $children; ?>
		<li><a href="<?php bloginfo('url'); ?>/categoria/links-de-interes/">Links de interés</a>
			<ul class="children">
			
			</ul>
		</li>
	</ul>
<?php }
}
elseif(is_category_or_sub(29)) { ?>

<?php /* <h1 id="titulo-cat">Capacitación</h1> */?>
<?php
query_posts('page_id=404');
if ( have_posts() ) : while ( have_posts() ) : the_post();
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
}
else{
	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
	}
}

if ($children) { ?>
	<ul class="menu">
		<?php echo $children; ?>
		<li class="current_page_item">
        	<a href="<?php bloginfo('url'); ?>/categoria/links-de-interes/">Links de interés</a>
            <ul class="children">
            
            </ul>
        </li>
	</ul>
<?php } endwhile;endif;wp_reset_query(); ?>
<?php } elseif(is_page(548) || $post->post_parent == (548)){
	
	query_posts('page_id=1029');
	if (have_posts()) : while (have_posts()) : the_post();
	
	$miembros = getGroupOrder('banner_link');
	foreach($miembros as $miembro){
		echo '<a href="'.get("banner_link",$miembro).'"><img src="'.get('banner_imagen',$miembro).'"width="220" /></a>';
	}
	endwhile;endif;wp_reset_query();    

} elseif(is_single()){
	query_posts('page_id=1029');
	if (have_posts()) : while (have_posts()) : the_post();
	
	$miembros = getGroupOrder('banner_link');
	foreach($miembros as $miembro){
		echo '<a href="'.get("banner_link",$miembro).'"><img src="'.get('banner_imagen',$miembro).'"width="220" /></a>';
	}
	endwhile;endif;wp_reset_query();  	
} elseif(is_category()){  ?>

	<?php wp_nav_menu( array('menu' => 'menu-ferias' ));
}else{
	if(!$post->post_parent){
        // will display the subpages of this top level page
        $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
		query_posts('page_id=1029');
        if (have_posts()) : while (have_posts()) : the_post();
        
		$miembros = getGroupOrder('banner_link');
        foreach($miembros as $miembro){
        	echo '<a href="'.get("banner_link",$miembro).'"><img src="'.get('banner_imagen',$miembro).'"width="220" /></a>';
        }
        endwhile;endif;wp_reset_query();    
    }
    else{
        if($post->ancestors) {
            // now you can get the the top ID of this page
            // wp is putting the ids DESC, thats why the top level ID is the last one
            $ancestors = end($post->ancestors);
            $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&sort_order=DESC");
        }
    }
    
    if ($children) { ?>
        <ul class="menu">
            <?php echo $children; ?>
        </ul>
	<?php } ?>
<?php } ?>

<?php
if(is_page(41) || get_topmost_parent($post->ID) ==41 || is_category('events') || is_category('prensa-filsa')){
}else{
query_posts('cat=13&showposts=3');
echo "<div class='aside-content'><br><h4>Noticias destacadas</h4>";
	if (have_posts()) : while (have_posts()) : the_post();
		echo "<div class='noticia-destacada'><a href='".get_permalink()."'><h5>".get_the_title()."</h5></a>";
		echo "<p>".excerpt2(10)."<a id='ver-mas' href='".get_permalink()."'>Siga leyendo »</a></p></div>";
	endwhile;endif;wp_reset_query();
echo "</div>";
}
?>