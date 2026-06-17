<?php 

namespace App\Models;

use App\Models\Achat_fille;
use App\Models\Achat_mere;
use App\Models\CaisseModel;

class AchatControllers extends BaseController
{
    public function index()
    {
        return view('accueil/accueil');
    }

    public function insert_achat()
    {
        $caisseModel = new CaisseModel();
        $achatMereModel = new Achat_mere();
        $achatFilleModel = new Achat_fille();

        $caisse_id = $this->request->getPost('caisse_id');
        $idClient = $this->request->getPost('idClient');
        $idproduits = $this->request->getPost('produit_id'); 
        $qtt = $this->request->getPost('quantite');

        if (!$caisseModel->find($caisse_id)) {
            return redirect()->back()->with('error', 'Caisse non trouvée.');
        }

        $achatMereData = [
            'id_caisse' => $caisse_id,
            'idClient' => $idClient
        ];
        $achatMereId = $achatMereModel->insertAchaMere($achatMereData);

        $achatFilleData = [
            'id_achat_mere' => $achatMereId,
            'id_produit' => $idproduit,
            'quantite' => $qtt
        ];
        $achatFilleModel->insert($achatFilleData);

        $allAchatFille = $achatFilleModel->getAllAchatFilleByIdAchatMere($achatMereId);

        return \view('achat/achat', ['success' => 'Achat enregistré avec succès.', 'achatFille' => $allAchatFille , 'clientId' => $idClient]);

    }

}