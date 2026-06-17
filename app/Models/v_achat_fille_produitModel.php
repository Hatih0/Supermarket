<?php

namespace App\Models;

use CodeIgniter\Model;

class v_achat_fille_produitModel extends Model
{
    protected $table = 'v_achat_fille_produit';
    protected $primaryKey = 'id';

    public function get_v_achatfille_produit()
    {
        return $this->findAll();
    }

    public function get_v_achatfille_produit_by_idAchatMere($id)
    {
        return $this->where('id_achat_mere', $id)->findAll();
    }

}