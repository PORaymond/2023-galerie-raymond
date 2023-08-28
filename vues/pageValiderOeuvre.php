<!DOCTYPE html>
<html lang="en">
<?php

$titre = "Valider l’entrée de l'oeuvre";
//initialiser les variables
$titreOeuvre = "";
$descOeuvre = "";
$prix = 0;
$date = "";
$photo = "";
$categorie = "";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    if (empty($_SESSION['titre']) || empty($_SESSION['prix']) || empty($_SESSION['date']) || empty($_SESSION['photo'])) {
        header("Location: ?action=pageEntrerOeuvre");

    }
    if (isset($_SESSION)) {
        $titreOeuvre = $_SESSION['titre'];
        $descOeuvre = $_SESSION['descOeuvre'];
        $prix = $_SESSION['prix'];
        $date = $_SESSION['date'];
        $photo = $_SESSION['photo'];
        $categorie = $_SESSION['categorie'];
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style_admin.css">
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <h3>Voici les informations qui ont été entrées:</h3>
        <table>
            <tr>
                <th>Titre</th>
                <td><?php echo $titreOeuvre ?></td>
            </tr>
            <tr>
                <th>description</th>
                <td><?php echo $descOeuvre ?></td>
            </tr>
            <tr>
                <th>Prix</th>
                <td><?php echo $prix ?></td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td><?php echo $date ?></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><?php echo $photo ?></td>
            </tr>
            <tr>
                <th>Categorie</th>
                <td><?php echo $categorie ?></td>
            </tr>
        </table>


        <form style="display: inline" action="?action=pageInsererOeuvre" method="post">
            <input type="submit" value="Confirmer">
        </form>
        <form style="display: inline" action="?action=pageEntrerOeuvre" method="post">
            <input type="submit" value="Corriger">
        </form>
    </main>
</div>
</body>
</html>
