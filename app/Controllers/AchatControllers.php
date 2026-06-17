<?php

namespace App\Controllers;

use App\Models\Achat_fille;
use App\Models\Achat_mere;
use App\Models\CaisseModel;
use App\Models\ClientModel;
use App\Models\ProduitModel;

class AchatControllers extends BaseController
{
    public function index()
    {
        return view('accueil/accueil');
    }

    public function afficherFormulaire($caisseId)
    {
        $caisseModel = new CaisseModel();
        $clientModel = new ClientModel();
        $produitModel = new ProduitModel();

        return view('achat/achat', [
            'caisse' => $caisseModel->find($caisseId),
            'clients' => $clientModel->findAll(),
            'produits' => $produitModel->findAll()
        ]);
    }

public function insert_achat()
{
    $achatMereModel = new Achat_mere();
    $achatFilleModel = new Achat_fille();
    $caisseModel = new CaisseModel();
    $produitModel = new ProduitModel();

    $db = \Config\Database::connect();

    $caisseId = $this->request->getPost('caisse_id');
    $idClient = $this->request->getPost('idClient');

    $details = json_decode(
        $this->request->getPost('detailsAchat'),
        true
    );

    if (!$caisseModel->find($caisseId)) {
        return redirect()->back()
            ->with('error', 'Caisse introuvable');
    }

    if (empty($details)) {
        return redirect()->back()
            ->with('error', 'Aucun produit sélectionné');
    }

    foreach ($details as $detail) {

        $produit = $produitModel->find($detail['id_produit']);

        if (!$produit) {
            return redirect()->back()
                ->with('error', 'Produit introuvable');
        }

        if ($produit['quantite_en_stock'] < $detail['quantite']) {
            return redirect()->back()
                ->with(
                    'error',
                    'Stock insuffisant pour le produit : ' .
                    $produit['designation']
                );
        }
    }

    $db->transStart();

    $achatMereId = $achatMereModel->insertAchaMere([
        'id_caisse' => $caisseId,
        'id_client' => $idClient
    ]);

    foreach ($details as $detail) {

        $achatFilleModel->insert([
            'id_achat_mere' => $achatMereId,
            'id_produit' => $detail['id_produit'],
            'quantite' => $detail['quantite']
        ]);

        $produit = $produitModel->find($detail['id_produit']);

        $nouveauStock =
            $produit['quantite_en_stock']
            - $detail['quantite'];

        $produitModel->update(
            $detail['id_produit'],
            [
                'quantite_en_stock' => $nouveauStock
            ]
        );
    }

    $db->transComplete();

    if (!$db->transStatus()) {
        return redirect()->back()
            ->with('error', 'Erreur lors de l\'enregistrement');
    }

    return redirect()->back()
        ->with('success', 'Achat enregistré avec succès');
}

}