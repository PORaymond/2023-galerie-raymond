<?php if (!isset($controleur)) header("Location: ..\index.php");
$titre = "Nouveau compte client";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title><?php echo $titre ?></title>
</head>
<body>
<?php include __DIR__ . '/inclusions/header.php' ?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/navCatalogue.php' ?>
    <main>
        <div class="container py-5 ">
            <h3 class="mb-2">Entrez vos informations</h3>

            <form action="?action=creerCompteClient" method="post" class="form form-outline mb-4">
                <input class="form-text" type="text" name="username" id="username" placeholder="Nom d'utilisateur" required="required" title="SVP entrez un nom d'utilisateur"><br>
                <input class="form-text" type="password" name="mdPasse" id="mdPasse"
                       placeholder="Mot de passe" required="required" title="SVP entrez un mot de passe"><br>
                <input class="form-text" type="text" name="prenom" id="prenom"
                       placeholder="Prénom" required="required"><br>
                <input class="form-text" type="text" name="nom_client" id="nom" placeholder="Nom"
                       required="required"><br>
                <input class="form-text" type="email" name="courriel" id="courriel" placeholder="Courriel"
                       required="required"><br>
                <input class="form-text" type="text" name="adresse" id="adresse"
                       placeholder="Adresse" required="required"><br>
                <input class="form-text" type="text" name="carteCredit" id="carteCredit"
                       placeholder="Carte de crédit" required="required"><br>
                <input class="btn btn-outline-dark btn-light btn-sm" type="submit"
                       value="Créer le nouveau compte client">
            </form>
        </div>
    </main>
</div>
</body>
</html>