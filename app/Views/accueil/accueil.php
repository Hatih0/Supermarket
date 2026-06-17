<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Caisse</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="page-header">
        <h1 class="page-header__title">Verifier caisse</h1>
        <p class="page-header__subtitle">Entrer id ciasse</p>
    </div>

    <div class="card">

        <?php if (isset($error)) { ?>
            <div class="error-msg">
                <?= $error ?>
            </div>
        <?php } ?>

        <form class="form-check" action="/Check_Caisse" method="get">
            <label for="caisse_id">ID caisse</label>
            <input
                type="number"
                name="caisse_id"
                id="caisse_id"
                placeholder="1"
                value="1"
                required
            >
            <button class="btn btn--primary" type="submit">Valider</button>
        </form>

        <hr class="divider">

        <form class="form-logout" action="/Logout" method="get">
            <button class="btn btn--danger-outline" type="submit">Deconnexion</button>
        </form>

    </div>

</body>
</html>