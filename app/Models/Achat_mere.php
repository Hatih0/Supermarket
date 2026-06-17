<?php 

namespace App\Models;
use CodeIgniter\Model;

class Achat_mere extends Model
{
    protected $table = 'achat_mere';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_caisse', 'id_client'];
    

    public function insertAchaMere($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }


}