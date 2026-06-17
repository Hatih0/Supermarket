<?php 

namespace App\Controllers;

use App\Models\CaisseModel;
use App\Models\ProduitModel;
use App\Models\ClientModel;

class CaisseController extends BaseController
{
    private $caisseModel;
    private $produitModel;
    private $clientModel;

    public function __construct()
    {
        $this->caisseModel = new CaisseModel();
        $this->produitModel = new ProduitModel();
        $this->clientModel = new ClientModel();
    }

    public function checkCaisse()
    {
        $caisseId = $this->request->getGet('caisse_id');

        $caisse = $this->caisseModel->find($caisseId);
        $produits = $this->produitModel->findAll();
        $clients = $this->clientModel->findAll();

        if ($caisse) {
            
            session()->set('caisse', $caisse);
            return \view('achat/achat', ['caisse' => $caisse, 'produits' => $produits, 'clients' => $clients]);

        } else {

            return \view('accueil/accueil', ['error' => 'Caisse non trouvée.']);

        }
    }
}