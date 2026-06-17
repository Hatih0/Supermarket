<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClient extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INTEGER', 'auto_increment' => true],
            'nom' => ['type' => 'TEXT', 'null' => true],
            'email' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('client');
    }

    public function down()
    {
        $this->forge->dropTable('client');
    }
}
