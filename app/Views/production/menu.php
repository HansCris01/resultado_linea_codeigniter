<?php require_once 'header.php'; ?>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('privada')}}" class="site_title"><i class="fa fa-cogs"></i> <span>Sistema web</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('multimedia/user.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>@auth {{Auth::user()->nombre}} {{Auth::user()->apellido_pat}} @endauth</h2>
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
				$tipo = Auth::user()->tipo_usuario;
				if($tipo == "ADMINISTRADOR" ):?>
                  <li><a><i class="fa fa-user"></i> Gestionar usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/listar_usuario') }}">Usuarios</a></li>
					  <li><a href="{{route('registro')}}">Crear usuario</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="{{url('/lst_inventario')}}">Inventario</a></li>
                      <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar Inventario</a></li>
                    </ul>
                  </li>
                 <li><a><i class="fa fa-money"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('/lst_venta')}}">Ver ventas</a></li>
					  <li><a href="{{route('registro_venta')}}">Agregar venta</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Indicadores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/indicadores') }}">Ver indicadores</a></li>                  
                    </ul>
                  </li>
               <?php elseif($tipo == "VENDEDOR"): ?>
			   
			    <li><a><i class="fa fa-edit"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="{{url('/lst_inventario')}}">Inventario</a></li>
                      <li><a type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar Inventario</a></li>
                    </ul>
                  </li>
                 <li><a><i class="fa fa-money"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('/lst_venta')}}">Ver ventas</a></li>
					  <li><a href="{{route('registro_venta')}}">Agregar venta</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Indicadores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/indicadores') }}">Ver indicadores</a></li>                  
                    </ul>
                  </li>
			   
			   <?php endif; ?>
                </ul>
              </div>
			             
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			  <?php $id= Auth::user()->id; ?>
              <a data-toggle="tooltip" href="{{ url('/usuario/'.$id.'/edit') }}" data-placement="top" title="Configurar mi usuario">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" target=_blank href="https://youtu.be/m4-RhEuAgJI" data-placement="top" title="Vídeo de guia del usuario">
                <span class="fa fa-film" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Desarrollador : Hans Luyo (hansluyo@outlook.es)">
                <span class="fa fa-info" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="cerrar sesion" href="{{route('logout')}}">
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
                    <img src="{{ asset('multimedia/user.jpg') }}" alt="">@auth {{Auth::user()->nombre}} {{Auth::user()->apellido_pat}} @endauth
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{ url('/ver_perfil') }}"> Perfil</a>
                  <a class="dropdown-item"  href="manual/manual.pdf" Target="_blank">Manual de usuaio</a>
                    <a class="dropdown-item"  href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i>cerrar sesion</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

      
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
<?php
use App\Models\categoria;
$categorias=Categoria::where("estado","=",1)->select("codigo_categoria","descripcion")->get();
?>
  <form action="{{ url('/agregar_inventario') }}" method="post" >
        @csrf
	    <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Registrar Inventario</h4>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Item <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="item_numero_contenedor" placeholder="Item (Número de contenedor)" required="required" />
                </div>
          </div>
		
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Proveedor<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="proveedor" placeholder="Proveedor" required="required" />
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
            <label class="col-form-label col-md-3 col-sm-3  label-align">Categoria<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
	        <select class="form-control" name="codigo_categoria">
				@foreach ( $categorias as $categoria )    
                  <option value="{{ $categoria->codigo_categoria }}">{{ $categoria->descripcion }}</option>
                @endforeach  
			</select>
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




<?php require_once 'footer.php'; ?>