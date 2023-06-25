<?php require_once 'menu.php'; ?>

<div class="right_col" role="main">

 <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Usuario <small>Activos || Inactivos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Estado</th>
                          <th>Nombre</th>
                          <th>Apellido paterno</th>
                          <th>Apellido materno</th>
						  <th>Tipo de usuario</th>
						  <th>Usuario</th>
						  <th>Acción</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php foreach($datos as $key): ?>
                        <tr>
                          <td><?php 
						  if($key->estado == 1):
							   echo "<font color=green>Activado</font>";
							   elseif($key->estado == 0):
							   echo "<font color=red>Desactivado</font>";
						  endif;
						  ?></td>						  
                          <td><?php echo $key->nombre ?></td>
                          <td><?php echo $key->apellido_pat ?></td>
                          <td><?php echo $key->apellido_mat ?></td>
                          <td><?php echo $key->descripcion ?></td>
                          <td><?php echo $key->email ?></td>
						  <td class=" last">
						     <a href="<?php echo base_url().'/obtenerIDactualizar_usuario/'.$key->cod_usuario ?>" title="editar"><button class="fa fa-pencil"></button></a>&nbsp &nbsp
							
							 <form method="POST" action="<?php echo base_url().'/activar_usuario' ?>">
							 <input type="hidden" name="cod_usuario" value="<?php echo $key->cod_usuario ?>">
							 <input type="hidden" name="id" value="<?php echo session('cod_usuario'); ?>">
                             <button title="Activar"><i class="fa fa-check-circle"></i></button> 
                             </form>
							
							 <form method="POST" action="<?php echo base_url().'/desactivar_usuario' ?>">
							 <input type="hidden" name="cod_usuario" value="<?php echo $key->cod_usuario ?>">
							 <input type="hidden" name="id" value="<?php echo session('cod_usuario'); ?>">
                             <button title="Desactivar"><i class="fa fa-trash"></i></button> 
                             </form>
							 	                                                							
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>

        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>


