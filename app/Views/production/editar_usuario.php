<?php require_once 'menu.php'; ?>
<?php 
    $cod_usuario = $datos[0]['cod_usuario'];
	$nombre = $datos[0]['nombre'];
    $apellido_pat = $datos[0]['apellido_pat'];
    $apellido_mat = $datos[0]['apellido_mat'];
    $cod_tipo_usuario = $datos[0]['cod_tipo_usuario']; 
	$descripcion = $datos[0]['descripcion']; 
	$email = $datos[0]['email'];
	$password = $datos[0]['password'];
 ?>

<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Editar Usuario</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                   
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="<?php echo base_url().'/actualizar_usuario_all' ?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo session('cod_usuario'); ?>">
                                            <input type="hidden" id="cod_usuario" name="cod_usuario" value="<?php echo $cod_usuario ?>">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre completo" required="required" />
                                            </div>
                                        </div>
										
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido Paterno<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="apellido_pat" value="<?php echo $apellido_pat ?>" placeholder="Apellido Paterno" required="required" />
                                            </div>
                                        </div>
										
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido materno<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="apellido_mat" value="<?php echo $apellido_mat ?>" placeholder="Apellido materno" required="required" />
                                            </div>
                                        </div>
										
										
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo de usuario<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
										      <select class="form-control" name="cod_tipo_usuario">
											        <option value="<?php echo $cod_tipo_usuario ?>"> -- <?php echo $descripcion ?> -- </option>
													<option value="1">ADMINISTRADOR</option>
													<option value="2">ADMISIONISTA</option>
											  </select>
										    </div>
                                        </div> 
										 
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" value="<?php echo $email ?>" class='email' required="required" type="email" /></div>
                                        </div>
										
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Escribir una nueva Password<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
											<input type="hidden" value="<?php echo $password ?>" name="password2" />
											<input class="form-control" type="password" name="password1" placeholder="Escribir una nueva contraseña" id="password1" />
											</div>
										</div>
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Grabar</button>
                                                    <a href="<?php $id = session('cod_usuario');
					                                 echo base_url().'/lst_usuario/'.$id ?>" class="btn btn-success">Salir</a>
                                                </div>
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

<?php require_once 'footer.php'; ?>