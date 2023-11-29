
<?php
include_once(__DIR__."/../modele/DAO/categorieDAO.class.php");
$tableau_categorie = CategorieDao::chercherTous();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
$titre = "Nouvelle oeuvre étape 3";
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
                                <form action="?action=entrerOeuvre4" method="post">
                                    <div class = "etape">

                                    <div class = "etape">
                                        <label class="oeuvre" for="categorie">Catégorie</label><br>
                                        <select name="categorie" id="categorie">
                                            <?php
                                            // Remplir l’élément select avec le catégories de ma base de données 
                                                foreach ($tableau_categorie as $entry) {
                                                    $value = $entry->getIdCategorie();
                                                    $label = $entry->getDescCategorie();
                                                    echo "<option value=\"$value\">$label</option>";
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <button onclick="montrerInputCategorie()" type="button" class="btn couleur-bouton">nouvelle catégorie</button>
                                        <br><br>
                                        <div id="nouvelleCategorie" style="display : none;">
                                            <input type="text" name="catégoies" id="cat" value="">
                                        </div>
                                        <br>
                                    </div>
                                        <!-- résumé de l’ajout-->
                                        <input type="submit" value="Ajouter">
                                    <?php 
                                    var_dump($_SESSION['titre']);
                                    var_dump($_SESSION['prix']);
                                    var_dump($_SESSION['date']);
                                    var_dump($_SESSION['photo']);
                                    ?>                                                         
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


