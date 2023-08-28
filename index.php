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