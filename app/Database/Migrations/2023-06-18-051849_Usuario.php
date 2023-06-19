<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
      public function up()
    {   
	    $this->db->disableForeignkeyChecks();
        $this->forge->addField([
            'cod_usuario' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cod_tipo_usuario' => [
                'type'       => 'INT',
                'constraint' => '5',
				'unsigned' => true,
				'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
			'password' => [
                'type' => 'TEXT',
                'null' => true,
            ],
			 'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
			 'apellido_pat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
			 'apellido_mat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
			 'estado' => [
                'type' => 'BIT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('cod_usuario', true);
		$this->forge->addForeignKey('cod_tipo_usuario', 'tipousuario', 'cod_tipo_usuario', 'CASCADE','SET NULL');
        $this->forge->createTable('Usuario');
        $this->db->enableForeignkeyChecks();		
    }

    public function down()
    {
        $this->forge->dropTable('Usuario');
    }
}
