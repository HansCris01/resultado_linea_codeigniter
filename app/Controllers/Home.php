<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index()
    {
		$mensaje = session('mensaje');
		return view('production/login', ["mensaje" => $mensaje]);
    }
	
	public function inicio() {
		return view('production/presentacion');
	}
	
	public function login()
	{   
	    $usuario = new UsuarioModel();
	    $email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		
		$datosUsuario = $usuario->login(['email' => $email]);

		if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {

			$data = [
						"cod_usuario" => $datosUsuario[0]['cod_usuario'],
						"nombre" => $datosUsuario[0]['nombre'],
						"apellido_pat" => $datosUsuario[0]['apellido_pat'],
						"apellido_mat" => $datosUsuario[0]['apellido_mat'],
						"cod_tipo_usuario" => $datosUsuario[0]['cod_tipo_usuario'],
						"descripcion" => $datosUsuario[0]['descripcion'],
						"email" => $datosUsuario[0]['email'],
						"password" => $datosUsuario[0]['password']
					];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('/inicio'))->with('mensaje','2');

		} else {
			return redirect()->to(base_url('/'))->with('mensaje','3');
		}
	    
	}
	
	public function perfil() {
		return view('production/perfil');
	}
	
	public function editar_usuario_log() {
		return view('production/editar_usuario_log');
	}
	
	public function creacion_usuario_externa()
	{   
	    $usuario = new UsuarioModel();
	    $email = $this->request->getPost('email');
	    $datosUsuario = $usuario->login(['email' => $email]);
	     
		if(count($datosUsuario) < 1):
	
	    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$datos = [
					"cod_tipo_usuario" => $_POST['cod_tipo_usuario'],
					"email" => $_POST['email'],
					"password" => $password,
					"nombre" => $_POST['nombre'],
					"apellido_pat" => $_POST['apellido_pat'],
					"apellido_mat" => $_POST['apellido_mat'],
					"estado" => 1
				];
		$User = new UsuarioModel();
		$respuesta = $User->insertar_usuario($datos);

		if ($respuesta > 0) {
			return redirect()->to(base_url().'/')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','0');
		}
		
		elseif(isset($datosUsuario)):
		
		echo "<script language='javascript'>";
        echo "alert('¡¡Ya existe ese usuario!!')";
        echo "</script>";
		
		$mensaje = session('mensaje');
		return view('production/login', ["mensaje" => $mensaje]);
		
		endif;
		
	}
	
	public function lst_usuario($cod_usuario) {
 
		$data = ["cod_usuario" => $cod_usuario];
		$usu = new UsuarioModel();
		$sql = $usu->listarUsuario($data);

		$datos = ["datos" => $sql];

		return view('production/lst_usuario', $datos);
	
    }
	
	public function creacion_usuario_interna()
	{
		 $usuario = new UsuarioModel();
	    $email = $this->request->getPost('email');
	    $datosUsuario = $usuario->login(['email' => $email]);
	     
		if(count($datosUsuario) < 1):
	
	    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$datos = [
					"cod_tipo_usuario" => $_POST['cod_tipo_usuario'],
					"email" => $_POST['email'],
					"password" => $password,
					"nombre" => $_POST['nombre'],
					"apellido_pat" => $_POST['apellido_pat'],
					"apellido_mat" => $_POST['apellido_mat'],
					"estado" => 1
				];
		$User = new UsuarioModel();
		$respuesta = $User->insertar_usuario($datos);

		
		$id = $_POST['id'];
		return redirect()->to(base_url().'/lst_usuario/'.$id);
				
		elseif(isset($datosUsuario)):
		
		return redirect()->to(base_url().'/')->with('mensaje','0');
			
		endif;
				
	}
	
	public function obtenerIDactualizar_usuario($cod_usuario)
	{
		$parametro = ["cod_usuario" => $cod_usuario];
		$usu = new UsuarioModel();
		$sql = $usu->buscar_cod_usuario_editar($parametro);

		$datos = ["datos" => $sql];

		return view('production/editar_usuario', $datos);
		
	}
	
	
	public function actualizar_usuario_all()
	{
	    $password1_validador = $this->request->getPost('password1');
		if(strlen($password1_validador) > 0):
		$password1 = password_hash($_POST['password1'], PASSWORD_DEFAULT);
		$datos = [
					"nombre" => $_POST['nombre'],
					"apellido_pat" => $_POST['apellido_pat'],
					"apellido_mat" => $_POST['apellido_mat'],
					"cod_tipo_usuario" => $_POST['cod_tipo_usuario'],
					"email" => $_POST['email'],
					"password" => $password1
				];
		$cod_usuario = $_POST['cod_usuario'];

		$UsuarioModel = new UsuarioModel();

		$respuesta = $UsuarioModel->actualizar_usuario($datos, $cod_usuario);

		$id = $_POST['id'];
		return redirect()->to(base_url().'/lst_usuario/'.$id);
		
		else:
		
		$datos = [
					"nombre" => $_POST['nombre'],
					"apellido_pat" => $_POST['apellido_pat'],
					"apellido_mat" => $_POST['apellido_mat'],
					"cod_tipo_usuario" => $_POST['cod_tipo_usuario'],
					"email" => $_POST['email']					
				];
		$cod_usuario = $_POST['cod_usuario'];

		$UsuarioModel = new UsuarioModel();

		$respuesta = $UsuarioModel->actualizar_usuario($datos, $cod_usuario);

		$id = $_POST['id'];
		return redirect()->to(base_url().'/lst_usuario/'.$id);
		
		endif;	
		
	}
	
    public function actualizar_usuario_logueado()
	{   
	    $password1_validador = $this->request->getPost('password1');
		if(strlen($password1_validador) > 0):
		$password1 = password_hash($_POST['password1'], PASSWORD_DEFAULT);
		$datos = [
					"nombre" => $_POST['nombre'],
					"apellido_pat" => $_POST['apellido_pat'],
					"apellido_mat" => $_POST['apellido_mat'],
					"cod_tipo_usuario" => $_POST['cod_tipo_usuario'],
					"email" => $_POST['email'],
					"password" => $password1
				];
		$cod_usuario = $_POST['cod_usuario'];

		$UsuarioModel = new UsuarioModel();

		$respuesta = $UsuarioModel->actualizar_usuario($datos, $cod_usuario);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','5');
		}
		else:
		
		$datos = [
					"nombre" => $_POST['nombre'],
					"apellido_pat" => $_POST['apellido_pat'],
					"apellido_mat" => $_POST['apellido_mat'],
					"cod_tipo_usuario" => $_POST['cod_tipo_usuario'],
					"email" => $_POST['email']					
				];
		$cod_usuario = $_POST['cod_usuario'];

		$UsuarioModel = new UsuarioModel();

		$respuesta = $UsuarioModel->actualizar_usuario($datos, $cod_usuario);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','5');
		}
		endif;
	}	
	
	public function activar_usuario()
	{
		$datos = [
					"estado" => 1
				];
		$cod_usuario = $_POST['cod_usuario'];

		$usu = new UsuarioModel();

		$usu->activar_desactivar_usuario($datos, $cod_usuario);

		$id = $_POST['id'];
		return redirect()->to(base_url().'/lst_usuario/'.$id);
	}
	
	public function desactivar_usuario()
	{
		$datos = [
					"estado" => 0
				];
		$cod_usuario = $_POST['cod_usuario'];

		$usu = new UsuarioModel();

		$usu->activar_desactivar_usuario($datos, $cod_usuario);

		$id = $_POST['id'];
		return redirect()->to(base_url().'/lst_usuario/'.$id);		
	}
	
	public function salir()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}
	
	
}
