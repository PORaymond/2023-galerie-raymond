<!DOCTYPE html>
<html lang="en">
<?php
$titre = "Ajouter une oeuvre";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérifier s’il y a un message des messages d’erreur pour les afficher le cas échéant
if (!isset($_SESSION['errTitre'])) {
    $_SESSION['errTitre'] = "";
}
if (!isset($_SESSION['errDescOeuvre'])) {
    $_SESSION['errDescOeuvre'] = "";
}
if (!isset($_SESSION['errDate'])) {
    $_SESSION['errDate'] = "";
}
if (!isset($_SESSION['errPhoto'])) {
    $_SESSION['errPhoto'] = "";
}
if (!isset($_SESSION['errPrix'])) {
    $_SESSION['errPrix'] = "";
}

//Vérifier si des champs sont déjà remplies
$titreOeuvre = "";
$descOeuvre = "";
$prix = "";
$date = "";
$photo = "";
if (isset($_SESSION['titre'])) {
    $titreOeuvre = $_SESSION['titre'];
}
if (isset($_SESSION['descOeuvre'])) {
    $descOeuvre = $_SESSION['descOeuvre'];
}
if (isset($_SESSION['prix'])) {
    $prix = $_SESSION['prix'];
}
if (isset($_SESSION['date'])) {
    $date = $_SESSION['date'];
}
if (isset($_SESSION['photo'])) {
    $photo = $_SESSION['photo'];
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
<?php include __DIR__ . '/inclusions/header.php' ?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="?action=pageValiderOeuvre" method="post">
                                    <label class="oeuvre" for="titre">Titre</label><br>
                                    <input type="text" name="titre" id="titre"
                                           value="<?php echo $titreOeuvre ?>"><span
                                            class="erreur"><?php echo $_SESSION['errTitre'] ?> </span><br>
                                    <label class="oeuvre" for="desc_oeuvre">Description</label><br>
                                    <input type="text" name="desc_oeuvre" id="desc_oeuvre"
                                           value="<?php echo $descOeuvre ?>"><span
                                            class="erreur"><?php echo $_SESSION['errDescOeuvre'] ?> </span><br>
                                    <label class="oeuvre" for="prix">Prix</label><br>
                                    <input type="number" step="any" name="prix" id="prix"
                                           value="<?php echo $prix ?>"><span
                                            class="erreur"><?php echo $_SESSION['errPrix'] ?> </span><br>
                                    <label class="oeuvre" for="date">Date de création</label><br>
                                    <input type="date" name="date" id="date" value="<?php echo $date ?>"><span
                                            class="erreur"><?php echo $_SESSION['errDate'] ?> </span><br>
                                    <!--Télécharger une photo-->
                                    <label class="oeuvre" for="photo"></label><br>
                                    <button type="button" class="btn btn-primary">Télécharger une photo</button>
                                    <br><br>
                                    <input type="text" name="photo" id="photo" value="<?php echo $photo ?>"><span
                                            class="erreur"><?php echo $_SESSION['errPhoto'] ?> </span><br>


                                    <label class="oeuvre" for="categorie">Catégorie</label><br>
                                    <select name="categorie" id="categorie">
                                        <option value="100">Monstres</option>
                                        <option value="200">Femmes</option>
                                        <option value="300">Hommes</option>
                                        <option value="400">Mctoffy</option>
                                        <option value="500">Cartes</option>
                                    </select>
                                    <input type="submit" value="Ajouter">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>


