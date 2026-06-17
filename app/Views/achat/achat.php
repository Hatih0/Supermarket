<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Saisie d'achat</h1>
    <p>Caisse : <?= $caisse['libelle'] ?></p>

    <form action="/Valider_Achat" method="post">

        <input type="hidden" name="caisse_id" value="<?= $caisse['id'] ?>">

        <select name="idClient" required>
            <?php foreach ($clients as $client) : ?>
                <option value="<?= $client['id'] ?>"><?= $client['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <select name="produit_id" required>

            <?php foreach ($produits as $produit) : ?>
                <option value="<?= $produit['id'] ?>"><?= $produit['description'] ?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="number" name="quantite" placeholder="Quantité" required>

        <button type="submit">Valider l'achat</button>
    
    </form>

    <table>

        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        
    </table>

</body>
</html>