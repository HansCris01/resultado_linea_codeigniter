<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cod_tipo_usuario' => [
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
        $this->forge->addKey('cod_tipo_usuario', true);
        $this->forge->createTable('TipoUsuario');
    }

    public function down()
    {
        $this->forge->dropTable('TipoUsuario');
    }
}
