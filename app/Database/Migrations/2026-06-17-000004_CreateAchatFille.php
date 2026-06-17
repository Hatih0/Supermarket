<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatFille extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INTEGER', 'auto_increment' => true],
            'id_achat_mere'=> ['type' => 'INTEGER', 'null' => true],
            'id_produit'   => ['type' => 'INTEGER', 'null' => true],
            'quantite'     => ['type' => 'REAL', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achat_fille');
    }

    public function down()
    {
        $this->forge->dropTable('achat_fille');
    }
}
