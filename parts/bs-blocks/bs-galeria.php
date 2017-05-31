<div class="galeria-imagenes">
    <?php
    $galerias = getGroupOrder('galeria_imagen_imagen');
        foreach($galerias as $galeria){ 
            echo get("galeria_imagen_imagen",$galeria);
		    }?>
</div>