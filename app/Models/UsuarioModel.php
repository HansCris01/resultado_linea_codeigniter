<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class UsuarioModel extends Model {
		
		protected $db;

        public function __construct()
        {
        $this->db = db_connect();
        }
		//funcion login
		public function login($email) {
		$query = $this->db->table('usuario')->select('usuario.cod_usuario, usuario.nombre, usuario.apellido_pat, usuario.apellido_mat, usuario.email, usuario.password, tipousuario.descripcion, tipousuario.cod_tipo_usuario')->join('tipousuario', 'usuario.cod_tipo_usuario = tipousuario.cod_tipo_usuario', 'inner')->where('email', $email)->where('estado', 1)->get();
		return $query->getResultArray();
		}
		//funcion agregar usuario
		public function insertar_usuario($datos) {
			$sql = $this->db->table('usuario');
			$sql->insert($datos);

			return $this->db->insertID(); 
		}
		//funcion listar usuario
		public function listarUsuario( $cod_usuario) {
        $query = $this->db->table('usuario');
        $query->select('usuario.estado, usuario.cod_usuario, usuario.nombre, usuario.apellido_pat, usuario.apellido_mat, usuario.email, usuario.password, tipousuario.descripcion, tipousuario.cod_tipo_usuario');
        $query->join('tipousuario', 'usuario.cod_tipo_usuario = tipousuario.cod_tipo_usuario', 'inner');
        $query->whereNotIn('usuario.cod_usuario', $cod_usuario);

        return $query->get()->getResult();
        }
		
		//Buscar para editar usuario
		public function buscar_cod_usuario_editar($cod_usuario) {
		 $sql =  $this->db->table('usuario');
		 $sql->select('usuario.estado, usuario.cod_usuario, usuario.nombre, usuario.apellido_pat, usuario.apellido_mat, usuario.email, usuario.password, tipousuario.descripcion, tipousuario.cod_tipo_usuario');
         $sql->join('tipousuario', 'usuario.cod_tipo_usuario = tipousuario.cod_tipo_usuario', 'inner');
	     $sql->where('usuario.cod_usuario',$cod_usuario);
		 return $sql->get()->getResultArray();
		}
	
        //Actualizar usuario
	    public function actualizar_usuario($data, $cod_usuario) {
			$sql = $this->db->table('usuario');
			$sql->set($data);
			$sql->where('cod_usuario', $cod_usuario);
			return $sql->update();
		}
		
		//Activar desactivar usuario
		 public function activar_desactivar_usuario($data, $cod_usuario) {
			$sql = $this->db->table('usuario');
			$sql->set($data);
			$sql->where('cod_usuario', $cod_usuario);
			return $sql->update();
		}
       		 
		 
	}