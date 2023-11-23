
<?php
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
/*
    if (empty($_SESSION['titre']) || empty($_SESSION['prix']) || empty($_SESSION['date']) || empty($_SESSION['photo'])) {
        header("Location: ?action=entrerOeuvre");

    }
    if (isset($_SESSION)) {
        $titreOeuvre = $_SESSION['titre'];
        $descOeuvre = $_SESSION['descOeuvre'];
        $prix = $_SESSION['prix'];
        $date = $_SESSION['date'];
        $photo = $_SESSION['photo'];
        $categorie = $_SESSION['categorie'];
    }

$titre = "Valider l’entrée de l'oeuvre";*/
?>
    <title><?php echo $titre ?></title>
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
