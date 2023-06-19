<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoResultado extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'cod_tipo_resultado' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'descripcion' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],            
        ]);
        $this->forge->addKey('cod_tipo_resultado', true);
        $this->forge->createTable('TipoResultado');
    }

    public function down()
    {
        $this->forge->dropTable('TipoResultado');
    }
}
