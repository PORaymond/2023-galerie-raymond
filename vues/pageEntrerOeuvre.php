<?php
include_once(__DIR__."/../modele/DAO/categorieDAO.class.php");
$tableau_categorie = CategorieDao::chercherTous();

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

//Réinitialisation des variables globales associées aux propriétés de la nouvelle oeuvre
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
    $titre = "Nouvelle oeuvre première étape"
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
                                <form action="?action=pageEntrerOeuvreEtape2" method="post">
                                    <div class="etape">
                                        <label class="oeuvre" for="titre">Titre</label><br>
                                        <input type="text" name="titre" id="titre"
                                               value="<?php echo $titreOeuvre ?>"><span
                                                class="erreur"><?php echo $_SESSION['errTitre'] ?> </span><br>
    
                                        <label class="oeuvre" for="desc_oeuvre">Description</label><br>
                                        <input type="text" name="desc_oeuvre" id="desc_oeuvre"
                                               value="<?php echo $descOeuvre ?>"><span
                                                class="erreur"><?php echo $_SESSION['errDescOeuvre'] ?> </span><br>

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
</body>



