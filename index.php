
<!DOCTYPE html>

<html lang="fr">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Inclusions-->
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

    <!--Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <!--JS et CSS maison-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
    <script type="text/javascript" src="assets/js/script.js"></script>
    
<?php
include_once "controleurs/controleurManufacture.class.php";

//Obtenir le bon controleur
//Si la requête contenant le paramètre action n'est pas renseigné
if (!isset($_GET['action'])) {
// on reste à la page d'accueil
    $action = "";
} else {
// Sinon on récupère l’action indiquée à accomplir
    $action = $_GET['action'];
}



//Creer une instance du contrôleur adapté
$controleur = Manufacture::creerControleur($action);
//qui contient maintenant des données qui peuvent être utilisées par la vue.


// Executer l'action et obtenir le nom de la vue
$nomVue = $controleur->executerAction();
// inclure la bonne vue
include_once(__DIR__."/vues/" . $nomVue . ".php");