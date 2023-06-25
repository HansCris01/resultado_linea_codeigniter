<?php require_once 'header.php'; ?>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-cogs"></i> <span>Sistema web</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>multimedia/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo session('nombre').' '.session('apellido_pat').' '.session('apellido_mat') ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
		       <?php 
				$tipo = session('cod_tipo_usuario');
				if($tipo == 1 ):?>
				
                  <li><a><i class="fa fa-user"></i> Gestionar usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php $id = session('cod_usuario');
					  echo base_url().'/lst_usuario/'.$id ?>">Usuarios</a></li>
					  <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg_2">Crear usuario</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Resultados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg_3">Agregar pacientes</a></li>
					  <li><a href="#">Pacientes</a></li>
					  <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg_1">Agregar resultados</a></li>
					  <li><a href="#">Consultar resultados</a></li>
                    </ul>
                  </li>
              <?php elseif($tipo == 2): ?>
			  
			   <li><a><i class="fa fa-edit"></i> Resultados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg_3">Agregar pacientes</a></li>
					  <li><a href="#">Pacientes</a></li>
					  <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg_1">Agregar resultados</a></li>
					  <li><a href="#">Consultar resultados</a></li>
                    </ul>
               </li>
			  
			  <?php endif; ?>
                </ul>
              </div>
			             
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			
              <a data-toggle="tooltip" href="<?php echo base_url('/editar_usuario_log') ?>" data-placement="top" title="Configurar mi usuario">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" target=_blank href="#" data-placement="top" title="Vídeo de guia del usuario">
                <span class="fa fa-film" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Desarrollador : Hans Luyo (hansluyo@outlook.es)">
                <span class="fa fa-info" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="cerrar sesion" href="<?php echo base_url('/salir') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>multimedia/user.jpg" alt=""><?php echo session('nombre').' '.session('apellido_pat').' '.session('apellido_mat'); ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url().'/perfil' ?>"> Perfil</a>
                  <a class="dropdown-item"  href="#">Manual de usuaio</a>
                    <a class="dropdown-item"  href="<?php echo base_url('/salir') ?>"><i class="fa fa-sign-out pull-right"></i>cerrar sesion</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

      
 <div class="modal fade bs-example-modal-lg_1" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

  <form action="#" method="post" >
       
	    <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Registrar Resultados</h4>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="email" class="form-control" name="email" placeholder="Email va a ser su usuario" required="required" />
                </div>
          </div>
		
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="pasword" class="form-control" name="password" placeholder="Proveedor" required="required" />
                </div>
        </div>
		
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Marca<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="marca" placeholder="Marca" required="required" />
                </div>
        </div>
										
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Modelo<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="modelo" placeholder="Modelo" required="required" />
                </div>
        </div>
										
								 
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripcion<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <textarea name='descripcion'></textarea></div>
            </div>			
		</div>
		
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button  class="btn btn-primary">Grabar</button>
		</div>
   </form>
	    </div>
	</div>
</div>



 <div class="modal fade bs-example-modal-lg_2" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

  <form action="<?php echo base_url().'creacion_usuario_interna' ?>" method="post" >
       <input type="hidden" name="id" value="<?php echo session('cod_usuario') ?>">
	    <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Registrar Usuario</h4>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
         <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="email" class="form-control" name="email" placeholder="Email va a ser su usuario" required="required" />
                </div>
          </div>
		
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required" />
                </div>
        </div>
		
		<div class="field item form-group">
             <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo de usuario<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6">
						<select class="form-control" name="cod_tipo_usuario">
							<option value="1">ADMINISTRADOR</option>
							<option value="2">ADMISIONISTA</option>
						</select>
					</div>
        </div>
										
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" />
                </div>
        </div>
										
								 
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido paterno<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" class="form-control" name="apellido_pat" placeholder="Apellido paterno" required="required" />  
            </div>			
		</div>
		
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido materno<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" class="form-control" name="apellido_mat" placeholder="Apellido materno" required="required" />  
            </div>			
		</div>
		
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button  class="btn btn-primary">Grabar</button>
		</div>
   </form>
	    </div>
	</div>
</div>
</div>

<div class="modal fade bs-example-modal-lg_3" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

 <form action="<?php echo base_url().'creacion_usuario_interna' ?>" method="post" >
       <input type="hidden" name="id" value="<?php echo session('cod_usuario') ?>">
	    <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Registrar Paciente</h4>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			</button>
		</div>
												
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" />
                </div>
        </div>
										
								 
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido paterno<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" class="form-control" name="apellido_pat" placeholder="Apellido paterno" required="required" />  
            </div>			
		</div>
		
		<div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido materno<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" class="form-control" name="apellido_mat" placeholder="Apellido materno" required="required" />  
            </div>			
		</div>
		
		
		<label class="col-form-label col-md-3 col-sm-3 label-align">Género</label>
			<div class="col-md-6 col-sm-6 ">
				<div id="gender" class="btn-group" data-toggle="buttons">
					<label class="btn btn-secondary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" name="sexo" value="masculino" class="join-btn" data-parsley-multiple="gender" data-parsley-id="12"> &nbsp; Masculino &nbsp;
					</label>
					<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" name="sexo" value="femenino" class="join-btn" data-parsley-multiple="gender"> Femenino
					</label>
				</div>
			</div>
										
		
		
		
		
		
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button  class="btn btn-primary">Grabar</button>
		</div>
   </form>
	    </div>
	</div>
</div>