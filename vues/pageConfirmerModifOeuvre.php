<!DOCTYPE html>
<html lang="en">
<?php
$titre = "Confirmer";
?><head>
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
        <h3>Entrer les modifications</h3>
        <form action="?action=pageValiderModifOeuvre" method="post">
            <label for="titre">Titre</label><br>
            <input type="text" name="titre" id="titre" value="<?php echo $_SESSION['titre'] ?>"><span class="erreur"><?php echo $_SESSION['errTitre'] ?> </span><br>
            <label for="desc_oeuvre">Description</label><br>
            <input type="text" name="descOeuvre" id="desc_oeuvre" value="<?php echo $_SESSION['descOeuvre'] ?>"><span
                    class="erreur"><?php echo $_SESSION['errDescOeuvre'] ?> </span><br>
            <label for="prix">Prix</label><br>
            <input type="number" step="any" name="prix" id="prix" value="<?php echo $_SESSION['prix'] ?>"><span
                    class="erreur"><?php echo $_SESSION['errPrix'] ?> </span><br>
            <label for="date">Date de création</label><br>
            <input type="date" name="date" id="date" value="<?php echo $_SESSION['dateCreation'] ?>"><span class="erreur"><?php echo $_SESSION['errDate'] ?> </span><br>
            <label for="photo">Photo</label><br>
            <input type="text" name="photo" id="photo" value="<?php echo $_SESSION['url_photo'] ?>"><span class="erreur"><?php echo $_SESSION['errPhoto'] ?> </span><br>
            <label for="categorie">Catégorie</label><br>
            <select name="categorie" id="categorie">
                <option value="100">Monstres</option>
                <option value="200">Femmes</option>
                <option value="300">Hommes</option>
                <option value="400">Mctoffy</option>
                <option value="500">Cartes</option>
            </select>
            <input type="submit" value="Ajouter">
        </form>
    </main>
</div>
</body>
</html>