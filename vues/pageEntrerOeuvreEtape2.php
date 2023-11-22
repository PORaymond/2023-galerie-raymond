
<?php
include_once(__DIR__."/../modele/DAO/categorieDAO.class.php");
$tableau_categorie = CategorieDao::chercherTous();
$titre = "Ajouter une oeuvre";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification des messages d’erreur
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

//Réinitialisation des variables globale associées aux propriétés de la nouvelle oeuvre
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
//Appel de la fonction categorieDao::chercherTous()
    $titre = "Nouvelle oeuvre étape 2";
?>
    <title><?php echo $titre ?></title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php' ?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card couleur-fond text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="?action=pageValiderOeuvre3" method="post">
                                                                        
                                    <div class = "etape">
                                        <label class="oeuvre" for="date">Date de création</label><br>
                                        <input type="date" name="date" id="date" value="<?php echo $date ?>"><span
                                        class="erreur"><?php echo $_SESSION['errDate'] ?> </span><br>
                                        <!--Télécharger une photo-->
                                        
                                        <br><br>
                                        <label class="oeuvre" for="prix">Prix</label><br>
                                        <input type="number" step="any" name="prix" id="prix"
                                        value="<?php echo $prix ?>"><span
                                        class="erreur"><?php echo $_SESSION['errPrix'] ?> </span><br>
                                        
                                        <button type="button" class="btn couleur-bouton">Télécharger une photo</button>
                                        <label class="oeuvre" for="photo"></label><br>
                                        <input type="text" name="photo" id="photo" value="<?php echo $photo ?>"><span
                                                class="erreur"><?php echo $_SESSION['errPhoto'] ?> </span><br>
                                                <input type="submit" value="Ajouter">

                                    </div>                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


    <script src="assets/js/script.js"></script>
    
    
</script>
    </body>
</html>


