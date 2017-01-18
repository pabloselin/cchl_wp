<?php 
    $options = get_option( 'cchl_settings' );
?>

	<footer class="site-footer">
   	    <div class="container">
    	
        <div class="row">
            
            <div class="caja-info col-md-5">
                <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/img/logos/camara-chilena-del-libro.png" alt="<?php bloginfo('name' );?>"></a><br>
                           <p><?php bloginfo('name');?> <br /> <?php echo $options['cchl_linea'];?> <br/> <?php echo $options['cchl_direccion'];?><br/>
                Tel: <a style="display:inline;" href="tel:<?php echo $options['cchl_fono'];?>"><?php echo $options['cchl_fono'];?></a> <br /><a href="mailto:<?php echo $options['cchl_email'];?>">E-mail: <?php echo $options['cchl_email'];?></a>
                </p>
            </div>
            
                    
            <ul class="ferias col-md-3">
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
                <li><a href="/agencia-isbn/que-es/">Agencia ISBN</a></li>
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
        
            </div>

        </div>
    </footer>    

    
    
</body>


</html>
<?php wp_footer(); ?>