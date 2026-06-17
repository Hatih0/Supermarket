<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitCaisseSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('produit')->insertBatch([
            ['price' => 100, 'quantite_en_stock' => 100, 'designation' => 'Souris'],
            ['price' => 80,  'quantite_en_stock' => 20,  'designation' => 'Clavier'],
            ['price' => 120, 'quantite_en_stock' => 30,  'designation' => 'Chaise gamer'],
            ['price' => 130, 'quantite_en_stock' => 80,  'designation' => 'Table'],
            ['price' => 75,  'quantite_en_stock' => 60,  'designation' => 'Tapis'],
        ]);

        $this->db->table('caisse')->insertBatch([
            ['libelle' => 'Caisse 1'],
            ['libelle' => 'Caisse 2'],
        ]);

        $this->db->table('client')->insertBatch([
            ['nom' => 'Rakoto', 'email' => 'rakoto@gmail.com'],
            ['nom' => 'Rabe' ,'email' => 'rabe@gmail.com'],
            ['nom' => 'Rasoa','email' => 'rasoa@gmail.com'],
        ]);
    }
}
