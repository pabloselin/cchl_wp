<?php

$colaboradores = get_post_meta( get_the_ID(), 'colaboradores_group', true );
$orgcols = array();

foreach ( (array) $colaboradores as $key => $colaborador ) {

    $grupo = isset( $colaborador['cchl_tipocol'] ) ? esc_attr( $colaborador['cchl_tipocol'] ) : '';
    
	$cchl_imgcol = $cchl_nombrecol = $cchl_url = '';

	if ( isset( $colaborador['cchl_nombrecol'] ) ) {
		$cchl_nombrecol = esc_html( $colaborador['cchl_nombrecol'] );
	}

	if ( isset( $colaborador['cchl_urlcol'] ) ) {
		$cchl_url = esc_url( $colaborador['cchl_urlcol'] );
	}

	if ( isset( $colaborador['cchl_imgcol'] ) ) {
		    $cchl_imgcol = $colaborador['cchl_imgcol'];
	}

    if ( isset( $colaborador['cchl_imgcol_id'] ) ) {
		    $cchl_imgcol_id = $colaborador['cchl_imgcol_id'];
	}

	// Do something with the data

    $orgcols[$grupo][] = array(
                            'cchl_nombrecol' => $cchl_nombrecol,
                            'cchl_url' => $cchl_url,
                            'cchl_imgcol' => $cchl_imgcol,
                            'cchl_imgcol_id' => $cchl_imgcol_id
                            );
}

foreach($orgcols as $key=>$orgcol) {
    
    ?>
    
    <div class="colaborador-group-header row">
        <h2 class="col-md-12"><?php echo $key;?></h2>
    </div>

    <div class="colaborador-group row row-flex">
        <?php foreach($orgcol as $orgco):
            $img_col = wp_get_attachment_image( $orgco['cchl_imgcol_id'], 'thumbnail' );
        ?>

            <div class="colaborador-item col-md-3 col-flex">
                <?php echo $img_col;?>
                
                <h4><?php echo $orgco['cchl_nombrecol'];?></h4>
                
                
                <?php if($orgco['cchl_url']) {?>

                    <p><a href="<?php echo $orgco['cchl_url'];?>" target="_blank" class="link-external"><i class="fa fa-external-link"></i></a></p>

                <?php }?>
            </div>


        <?php endforeach;?>

    </div>

    <?php

}