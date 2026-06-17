<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if (isset($error)) : ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form action="/Check_Caisse" method="get">

        <input type="number" name="caisse_id" id="caisse_id" placeholder="Entrez l'ID de la caisse" required>
        <button type="submit">Valider</button>

    </form>
    <form action="/Logout" method="get">
        <br><br><br><br><br><br><br><br><br><br>
        <button type="submit">Deconnexion</button>
    </form>

</body>
</html>