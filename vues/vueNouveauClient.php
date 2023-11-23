<?php if (!isset($controleur)) header("Location: ..\index.php");
$titre = "Nouveau compte client";
?>

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