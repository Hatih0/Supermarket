<?php 

namespace App\Controllers;

use App\Models\CaisseModel;
use App\Models\ProduitModel;

class CaisseController extends BaseController
{
    private $caisseModel;
    private $produitModel;

    public function __construct()
    {
        $this->caisseModel = new CaisseModel();
        $this->produitModel = new ProduitModel();
    }

    public function checkCaisse()
    {
        $caisseId = $this->request->getGet('caisse_id');

        $caisse = $this->caisseModel->find($caisseId);
        $produits = $this->produitModel->findAll();

        if ($caisse) {
            
            session()->set('caisse', $caisse);
            return \view('achat/achat', ['caisse' => $caisse, 'produits' => $produits]);

        } else {

            return \view('accueil/accueil', ['error' => 'Caisse non trouvée.']);

        }
    }
}