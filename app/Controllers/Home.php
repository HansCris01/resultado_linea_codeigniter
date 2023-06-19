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
		return view('production/menu');
	}
	
	public function login()
	{   
	    $usuario = new UsuarioModel();
	    $email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		
		$datosUsuario = $usuario->obtenerUsuario(['email' => $email]);

		if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {

			$data = [
						"cod_usuario" => $datosUsuario[0]['cod_usuario'],
						"nombre" => $datosUsuario[0]['nombre'],
						"apellido_pat" => $datosUsuario[0]['apellido_pat'],
						"apellido_mat" => $datosUsuario[0]['apellido_mat'],
						"cod_tipo_usuario" => $datosUsuario[0]['cod_tipo_usuario']
					];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('/inicio'))->with('mensaje','2');

		} else {
			return redirect()->to(base_url('/'))->with('mensaje','3');
		}
	    
	}
	
	

	
	
	public function creacion_usuario_externa()
	{   
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
		$respuesta = $User->insertar($datos);

		if ($respuesta > 0) {
			return redirect()->to(base_url().'/')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','0');
		}
	}
	
	
	public function creacion_usuario_interna()
	{
		
				
	}
	
	public function obtenerIDactualizar_usuario()
	{
		
		
	}
	
	
	public function actualizar_usuario()
	{
		
		
	}
	
	
	
	
	public function desactivar_usuario()
	{
		
		
	}
	
	public function salir()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}
	
	
}
