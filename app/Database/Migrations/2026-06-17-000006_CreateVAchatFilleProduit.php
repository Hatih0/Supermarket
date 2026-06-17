<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVAchatFilleProduit extends Migration
{
    public function up()
    {
        $sql = "
            CREATE VIEW v_achat_fille_produit AS
            SELECT
                af.id,
                af.id_achat_mere,
                af.id_produit,
                af.quantite,

                p.designation,
                p.price,
                p.quantite_en_stock,

                (af.quantite * p.price) AS montant
            FROM achat_fille af
            JOIN produit p ON af.id_produit = p.id
        ";

        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query('DROP VIEW IF EXISTS v_achat_fille_produit');
    }
}