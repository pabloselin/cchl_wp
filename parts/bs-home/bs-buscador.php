<!--<div class="buscador">
            	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
					<input type="text" size="" name="s" id="s" value="Buscar..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
					<input type="submit" id="searchsubmit" value="" class="btn" />
				</form>
			</div>-->

<form class="navbar-form navbar-left buscador-cabecera" role="search" method="get" action="<?php bloginfo('url');?>/" >
            <div class="form-group">
                
                <div class="input-group">
    
                    
                        <input type="text" class="form-control" name="s" id="s" value="Buscar" placeholder="Buscar" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='') this.value=this.defaultValue;">
                        <div class="input-group-addon"><button class="btn" type="submit"><i class="fa fa-search"></i></button></div>
                    </div>

            </div>

            <!--<input type="submit" class="btn btn-default" value=""> <i class="fa fa-search"></i> </input>-->

        </form>