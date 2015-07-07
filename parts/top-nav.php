<div id="top">
   		 <div class="container_16 cf"> 
            <ul class="menutop cf">
                <!-- <li class="observatorio"><a href="<?php bloginfo('url'); ?>/observatorio-del-libro-y-la-lectura/definicion/">OBSERVATORIO del LIBRO y la LECTURA</a></li> -->
                <li class="newsletter"><a href="<?php bloginfo('url'); ?>/suscripcion-al-newsletter">SUSCRIPCIÓN al NEWSLETTER</a></li>
                <li class="preguntas"><a href="<?php bloginfo('url'); ?>/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
                <li class="mapadelsitio"><a href="<?php bloginfo('url'); ?>/mapa-de-sitio">MAPA del SITIO</a></li>
            </ul>
            <ul id="redes-sociales" class="cf">
                <li class="feisbuk"><a href="http://www.facebook.com/camarachilenalibro" target="_blank" class="facebook">Facebook</a></li>
                <li class="tuiter"><a href="http://twitter.com/CamaradelLibro" target="_blank" class="twitter">Twitter</a></li>
                <li class="yutub"><a href="http://www.youtube.com/user/FILSACHILE" target="_blank" class="youtube">Youtube</a></li>
            </ul>
    </div>
	</div>
    <?php if(!is_home() && (in_category(33)||in_category(32)||in_category(101)||in_category(21)||in_category(68)||is_page(45)||is_page(88)||is_page(144)||is_page(90)) ) :?>
    <div id="header" class="container_16 cf header-socios">
<?php else:?>
    <div id="header" class="container_16 cf">
<?php endif;?>
    	
        	<div class="buscador">
            	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
					<input type="text" size="" name="s" id="s" value="Buscar..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
					<input type="submit" id="searchsubmit" value="" class="btn" />
				</form>
			</div>
		<h1 id="mainlogo testclass">
    		<a href="<?php bloginfo( 'url' ); ?>">Cámara Chilena del Libro 60 años trabajando por el libro y la lectura</a>
        </h1>
        <ul id="topmenu-principal">
        	<?php wp_nav_menu( array('menu' => 'Principal' )); ?>
        </ul>
        <?php if(!is_home() && (in_category(33)||in_category(32)||in_category(101)||in_category(21)||in_category(68)||is_page(45)||is_page(88)||is_page(144)||is_page(90)) ):?>
            <ul id="menu-socios-container">
                <?php wp_nav_menu( array('menu' => 'Socios - interior'));?>
            </ul>
        <?php endif;?>
    </div>
