<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>

    <div class="card">

        <h1 class="login-title">Connexion</h1>
        <p class="login-sub">Accédez à votre espace caisse</p>

        <form action="/LoginCheck" method="post">

            <div class="field">
                <label for="login">Login</label>
                <input
                    type="text"
                    id="login"
                    name="login"
                    placeholder="Votre identifiant"
                    value="defaultlogin"
                    required
                >
            </div>

            <div class="field">
                <label for="password">Mot de passe</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    value="defaultpasswd"
                    required
                >
            </div>

            <input class="btn-submit" type="submit" value="Se connecter">

        </form>

    </div>

</body>
</html>