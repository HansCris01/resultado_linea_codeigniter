<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pacientes extends Migration
{
     public function up()
	 { 
        $this->db->disableForeignkeyChecks();
        $this->forge->addField([
            'cod_paciente' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
			 'apellido_pat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
			 'apellido_mat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
			 'sexo' => [
                'type'       => 'CHAR',
                'constraint' => '1',
            ],
			
            'edad' => [
                'type' => 'INT',
                'constraint' => 3,
				'unsigned' => true,
				'null' => true,
            ],
			
			'cod_tipo_documento' => [
			    'type' => 'INT',
                'constraint' => '5',
				'unsigned' => true,
				'null' => true,
            ],
			 'numero_doc' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
			 'fecha_registro' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
			'estado' => [
                'type' => 'BIT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('cod_paciente', true);
		$this->forge->addForeignKey('cod_tipo_documento', 'TipoDocumento', 'cod_tipo_documento', 'CASCADE', 'SET NULL');
        $this->forge->createTable('Pacientes');
		$this->db->enableForeignkeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('Pacientes');
    }
}
