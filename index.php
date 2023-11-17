
<!DOCTYPE html>

<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style_accueil.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

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