
<?php
include_once(__DIR__."/../modele/DAO/categorieDAO.class.php");
$tableau_categorie = CategorieDao::chercherTous();
$titre = "Ajouter une oeuvre";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Réinitialisation des variables globale associées aux propriétés de la nouvelle oeuvre
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
                                <form action="?action=entrerOeuvreEtape3" method="post">
                                                                        
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


