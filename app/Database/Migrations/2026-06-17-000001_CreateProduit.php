<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INTEGER', 'auto_increment' => true],
            'designation'       => ['type' => 'TEXT', 'null' => true],
            'price'             => ['type' => 'REAL', 'null' => true],
            'quantite_en_stock' => ['type' => 'REAL', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produit');
    }

    public function down()
    {
        $this->forge->dropTable('produit');
    }
}
