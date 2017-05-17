<?php 
    $options = get_option( 'cchl_settings' );
?>
    <footer class="footer-mobile visible-xs visible-sm">
        <ul>
            <li class="redes-footer"><a href="https://facebook.com/<?php echo $options['cchl_fbcamara'];?>"><i class="fa fa-facebook"></i></a> </li>
			<li class="redes-footer"><a href="https://twitter.com/<?php echo $options['cchl_twitter'];?>"><i class="fa fa-twitter"></i></a> </li>
			<li class="redes-footer"><a href="<?php echo $options['cchl_youtube'];?>"><i class="fa fa-youtube-play"></i></a> </li>
            <li class="redes-footer"><a href="https://instagram.com/<?php echo $options['cchl_instagram'];?>"><i class="fa fa-instagram"></i></a> </li>
        </ul>
    </footer>
	<footer class="site-footer hidden-sm hidden-xs">
   	    <div class="container">
    	
        <div class="row">
            
            <div class="caja-info col-md-4">
                <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/img/logos/cchl_logo_gris.svg" alt="<?php bloginfo('name' );?>" width="238" height="80"></a><br>
                           <p><?php bloginfo('name');?> <br /> <?php echo $options['cchl_linea'];?> <br/> <?php echo $options['cchl_direccion'];?><br/>
                Tel: <a style="display:inline;" href="tel:<?php echo $options['cchl_fono'];?>"><?php echo $options['cchl_fono'];?></a> <br /><a href="mailto:<?php echo $options['cchl_email'];?>">E-mail: <?php echo $options['cchl_email'];?></a>
                </p>
            </div>
            
                    
            <ul class="ferias col-md-2">
                <li><strong>Ferias</strong></li>
                <li><a href="/ferias/historia-de-las-ferias/">Historia de las ferias</a></li>
                <li><a href="/ferias/filsa/">FILSA</a></li>
                <li><a href="/ferias/feria-del-libro-infantil-juvenil/">Feria del Libro Infantil y Juvenil </a></li>
                <li><a href="/ferias/feria-del-libro-comunales/">Ferias del Libro comunales</a></li>
                <li><a href="/ferias/feria-del-libro-regionales/">Ferias del Libro regionales</a></li>
                <li><a href="/ferias/ferias-en-el-extranjero/">Ferias en el extranjero</a></li>
            </ul>

            
            <ul class="otros col-md-2">
                <li><strong>Otros</strong></li>
                <li><a href="/categoria/capacitacion/">Capacitación</a></li>
                <li><a href="/categoria/sala-de-prensa/concursos-literarios/">Concursos literarios</a></li>
                <li><a href="/categoria/sala-de-prensa/">Sala de prensa</a></li>
                <li><a href="/socios">Socios de la Cámara</a></li>
                <li><a href="/agencia-isbn">Agencia ISBN</a></li>
            </ul>
            
            <ul class="informacion col-md-2">
                <li><strong>Información</strong></li>
                <li><a href="/quienes-somos/">Quiénes somos</a></li>
                <li><a href="/que-hacemos">Qué hacemos</a></li>
                <li><a href="/observatorio-del-libro-y-la-lectura/definicion/">Estudios y estadísticas</a></li>
                <li><a href="/suscripcion-al-newsletter/">Suscripción a newsletter</a></li>
                <li><a href="/preguntas-frecuentes/">Preguntas frecuentes</a></li>
                        <li><a href="/contacto/">Contacto</a></li>
            </ul>    

            <ul class="redes col-md-2">
                 <li><strong>Redes Sociales</strong></li>
                <li><a href="https://facebook.com/<?php echo $options['cchl_fbcamara'];?>"><i class="fa fa-fw fa-facebook"></i> Facebook</a> </li>
                <li><a href="https://twitter.com/<?php echo $options['cchl_twitter'];?>"><i class="fa fa-fw fa-twitter"></i> Twitter</a> </li>
                <li><a href="<?php echo $options['cchl_youtube'];?>"><i class="fa fa-fw fa-youtube-play"></i> Youtube</a> </li>
                <li><a href="https://instagram.com/<?php echo $options['cchl_instagram'];?>"><i class="fa fa-fw fa-instagram"></i> Instagram</a> </li>
            </ul>    	
        
            </div>

        </div>
    </footer>    

    
    
</body>


</html>
<?php wp_footer(); ?>