<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoDocumento extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'cod_tipo_documento' => [
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
        $this->forge->addKey('cod_tipo_documento', true);
        $this->forge->createTable('TipoDocumento');
    }

    public function down()
    {
        $this->forge->dropTable('TipoDocumento');
    }
}
