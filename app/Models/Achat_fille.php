<?php

namespace App\Models;
use CodeIgniter\Model;

class Achat_fille extends Model
{
    protected $table = 'achat_fille';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_achat_mere', 'id_produit', 'quantite'];

    public function getAllAchatFilleByIdAchatMere($idAchatMere)
    {
        return $this->where('id_achat_mere', $idAchatMere)->findAll();
    }


}
