<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Resultado extends Migration
{
   public function up()
    {
		$this->db->disableForeignkeyChecks();
        $this->forge->addField([
            'cod_resultado' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cod_tipo_resultado' => [
                'type'           => 'INT',
                'constraint' => '5',
				'unsigned' => true,
				'null' => true,
            ],
            'cod_paciente' => [
                'type'           => 'INT',
                'constraint' => '5',
				'unsigned' => true,
				'null' => true,
            ],
			  'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
			  'descripcion' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
			 'archivo' => [
                'type' => 'TEXT',
                'null' => true,
            ],
			'fecha_registro' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
			
        ]);
        $this->forge->addKey('cod_resultado', true);
		$this->forge->addForeignKey('cod_tipo_resultado', 'TipoResultado', 'cod_tipo_resultado', 'CASCADE', 'SET NULL');
		$this->forge->addForeignKey('cod_paciente', 'Pacientes', 'cod_paciente', 'CASCADE', 'SET NULL');
        $this->forge->createTable('Resultado');
		$this->db->enableForeignkeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('Resultado');
    }
}
