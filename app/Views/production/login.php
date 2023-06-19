<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema web | </title>
 
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		                  
            <form method="post" action="<?php echo base_url('login') ?>">
			  
              <h1>Sistema Resultados en linea</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Iniciar sesion</button>     			
              </div>

              <div class="clearfix"></div>

              <div class="separator">
		    	<p class="change_link">Necesitas un usuario para acceder al sistema?
                  <a href="#signup" class="to_register"> Cree su cuenta aquí </a>
                </p>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-building"></i> Sistemas Web</h1>
                  <p>©<?php echo date('Y') ?> Desarrollado por Hans Luyo</p>
                </div>
              </div>
            </form>
          </section>
        </div>
  <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url().'creacion_usuario_externa' ?>" >
              
              <h1>Crear cuenta</h1>
              <div>
                <input type="text" class="form-control" name="nombre" placeholder="nombre" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="apellido_pat" placeholder="apellido_pat" required="" />
              </div>
			  <div>
                <input type="text" class="form-control" name="apellido_mat" placeholder="apellido_mat" required="" />
              </div>
			  
			  <div>
                <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo de usuario<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6">
						<select class="form-control" name="cod_tipo_usuario">
							<option value="1">ADMINISTRADOR</option>
							<option value="2">ADMISIONISTA</option>
						</select>
					</div>
              </div> 
			  
			   <div>
                <input type="email" class="form-control" name="email" placeholder="email" required="" />
              </div>
			  
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Crear</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ir al login ?
                  <a href="#signin" class="to_register"> regresar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>
                 <p>©<?php echo date('Y') ?> Desarrollado por Hans Luyo</p>
                </div>	
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == '1') {
            swal(':D','Usuario creado con exito!','success');
        } else if (mensaje == '2'){
            swal(':)','Bienvenido','success');
        } else if (mensaje == '3'){
            swal(':(','Usuario incorrecto!','error');
        } else if (mensaje == '0'){
            swal(':(','Error al crear usuario!','error');
        }
    </script>