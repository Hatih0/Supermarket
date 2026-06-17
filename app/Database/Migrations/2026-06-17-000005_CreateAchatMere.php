<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatMere extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INTEGER', 'auto_increment' => true],
            'id_client' => ['type' => 'INTEGER', 'null' => true],
            'id_caisse' => ['type' => 'INTEGER', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achat_mere');
    }

    public function down()
    {
        $this->forge->dropTable('achat_mere');
    }
}
