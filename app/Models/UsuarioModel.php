<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class UsuarioModel extends Model {
		
		protected $db;

        public function __construct()
        {
        $this->db = db_connect();
        }
		
		public function obtenerUsuario($email) {
		$query = $this->db->table('usuario')->where('email', $email)->where('estado', 1)->get();
		return $query->getResultArray();
		}
		
		public function insertar($datos) {
			$Nombres = $this->db->table('usuario');
			$Nombres->insert($datos);

			return $this->db->insertID(); 
		}
		
		
     
	 
	 
	 
	 
	}