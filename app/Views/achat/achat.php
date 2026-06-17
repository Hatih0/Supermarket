<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie Achat</title>
</head>
<body>

    <h1>Saisie d'achat</h1>

    <p>
        Caisse :
        <?= $caisse['libelle'] ?>
    </p>

    <form action="/Valider_Achat" method="post" id="formAchat">

        <input
            type="hidden"
            name="caisse_id"
            value="<?= $caisse['id'] ?>"
        >

        <input
            type="hidden"
            name="detailsAchat"
            id="detailsAchat"
        >

        <h3>Client</h3>

        <select name="idClient" required>
            <?php foreach ($clients as $client): ?>
                <option value="<?= $client['id'] ?>">
                    <?= $client['nom'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <hr>

        <h3>Ajouter un produit</h3>

        <select id="produit_id">

            <?php foreach ($produits as $produit): ?>

                <option
                    value="<?= $produit['id'] ?>"
                    data-designation="<?= $produit['designation'] ?>"
                    data-prix="<?= $produit['price'] ?>"
                >
                    <?= $produit['designation'] ?>
                    (<?= $produit['price'] ?> Ar)
                </option>

            <?php endforeach; ?>

        </select>

        <input
            type="number"
            id="quantite"
            placeholder="Quantité"
            min="1"
        >

        <button
            type="button"
            onclick="ajouterProduit()"
        >
            Ajouter Produit
        </button>

        <hr>

        <table border="1" id="tableProduits">

            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Montant</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="3">
                        <strong>Total</strong>
                    </td>
                    <td id="totalGeneral">
                        0
                    </td>
                    <td></td>
                </tr>
            </tfoot>

        </table>

        <br>

        <button type="submit">
            Clôturer Achat
        </button>

    </form>

    <script>

        let lignes = [];

        function ajouterProduit()
        {
            const select = document.getElementById("produit_id");

            const produitId =
                select.value;

            const designation =
                select.options[select.selectedIndex]
                .dataset.designation;

            const prix =
                parseFloat(
                    select.options[select.selectedIndex]
                    .dataset.prix
                );

            const quantite =
                parseFloat(
                    document.getElementById("quantite").value
                );

            if (!quantite || quantite <= 0)
            {
                alert("Veuillez saisir une quantité valide.");
                return;
            }

            const montant = prix * quantite;

            lignes.push({
                id_produit: produitId,
                quantite: quantite
            });

            const index = lignes.length - 1;

            const tbody =
                document.querySelector(
                    "#tableProduits tbody"
                );

            const tr = document.createElement("tr");

            tr.innerHTML = `
                <td>${designation}</td>
                <td>${prix}</td>
                <td>${quantite}</td>
                <td>${montant}</td>
                <td>
                    <button
                        type="button"
                        onclick="supprimerProduit(this, ${index})"
                    >
                        Supprimer
                    </button>
                </td>
            `;

            tbody.appendChild(tr);

            document.getElementById("detailsAchat").value =
                JSON.stringify(lignes);

            calculerTotal();

            document.getElementById("quantite").value = "";
        }

        function supprimerProduit(button, index)
        {
            lignes[index] = null;

            button.closest("tr").remove();

            const lignesValides =
                lignes.filter(item => item !== null);

            lignes = lignesValides;

            document.getElementById("detailsAchat").value =
                JSON.stringify(lignes);

            recalculerTable();
        }

        function recalculerTable()
        {
            const tbody =
                document.querySelector(
                    "#tableProduits tbody"
                );

            tbody.innerHTML = "";

            lignes.forEach((ligne, index) => {

                const produitOption =
                    document.querySelector(
                        `#produit_id option[value="${ligne.id_produit}"]`
                    );

                const designation =
                    produitOption.dataset.designation;

                const prix =
                    parseFloat(
                        produitOption.dataset.prix
                    );

                const montant =
                    prix * ligne.quantite;

                const tr =
                    document.createElement("tr");

                tr.innerHTML = `
                    <td>${designation}</td>
                    <td>${prix}</td>
                    <td>${ligne.quantite}</td>
                    <td>${montant}</td>
                    <td>
                        <button
                            type="button"
                            onclick="supprimerProduit(this, ${index})"
                        >
                            Supprimer
                        </button>
                    </td>
                `;

                tbody.appendChild(tr);

            });

            calculerTotal();
        }

        function calculerTotal()
        {
            let total = 0;

            lignes.forEach(ligne => {

                const option =
                    document.querySelector(
                        `#produit_id option[value="${ligne.id_produit}"]`
                    );

                const prix =
                    parseFloat(
                        option.dataset.prix
                    );

                total += prix * ligne.quantite;
            });

            document.getElementById("totalGeneral")
                .innerText = total + " Ar";
        }

        document
            .getElementById("formAchat")
            .addEventListener("submit", function(e)
        {
            if (lignes.length === 0)
            {
                e.preventDefault();

                alert(
                    "Veuillez ajouter au moins un produit."
                );
            }
        });

    </script>

</body>
</html>