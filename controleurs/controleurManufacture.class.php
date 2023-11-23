<?php
// *****************************************************************************************
// Description   : classe contenant la fonction statique qui génère les contrôleurs spécifiques
// Date        : 21 octobre 2022
// Auteurs      : Olivier Raymond et Elisabeth Tremblay
// *****************************************************************************************
include_once("controleurs/controleurAccueilDefaut.class.php");
include_once("controleurs/controleurAccueilCatalogue.class.php");
include_once("controleurs/controleurFactureCommande.class.php");
include_once("controleurs/controleurValiderOeuvre.class.php");
include_once("controleurs/controleurEntrerOeuvre.class.php");
include_once("controleurs/controleurEntrerOeuvreEtape2.class.php");
include_once("controleurs/controleurEntrerOeuvreEtape3.class.php");
include_once("controleurs/controleurEntrerOeuvreEtape4.class.php");
include_once("controleurs/controleurInsererOeuvre.php");
include_once("controleurs/controleurInsererOeuvre.php");
include_once("controleurs/controleurLoginClient.class.php");
include_once("controleurs/controleurDeconnexion.php");
include_once("controleurs/controleurAdminCatalogue.class.php");
include_once("controleurs/controleurLoginAdmin.class.php");
include_once("controleurs/controleurNouveauClient.class.php");
include_once("controleurs/controleurCreerCompteClient.class.php");
include_once("controleurs/controleurModifierOeuvre.class.php");
include_once("controleurs/controleurConfirmerModifOeuvre.class.php");
include_once("controleurs/controleurValiderModifOeuvre.class.php");
include_once("controleurs/controleurEnregistrerModification.class.php");
include_once("controleurs/controleurChoisirSuppressionOeuvre.class.php");
include_once("controleurs/controleurConfirmerSuppressionOeuvre.class.php");
include_once("controleurs/controleurSuppressionOeuvre.class.php");
include_once("controleurs/controleurDeconnexionAdmin.class.php");
include_once("controleurs/controleurSeConnecter.php");
include_once("controleurs/controleurSeConnecterAdmin.php");
include_once("controleurs/controleurConfirmCommande.class.php");
include_once("controleurs/controleurAjouterOeuvreAuPanier.php");
include_once("controleurs/controleurPanier.class.php");


class Manufacture
{
    //  Méthode qui crée une instance du controleur associé à l'action
    //  et le retourne
    public static function creerControleur($action)
    {
        $controleur = null;
        // actions liées à l’utilisateur anonyme
        if ($action == "accueilCatalogue") {
            $controleur = new CtlrAccueilCatalogue();
        } elseif ($action == "nouveauClient") {
            $controleur = new CtlrNouveauClient();
        // actions liées à l’admin
        // actions liées au client
        } elseif ($action == "factureCommande") {
            $controleur = new CtlrFactureCommande();
        } elseif ($action == "entrerOeuvre") {
            $controleur = new CtlrEntrerOeuvre();
        } elseif ($action == "entrerOeuvreEtape2") {
            $controleur = new CtlrEntrerOeuvreEtape2();
        } elseif ($action == "entrerOeuvreEtape3") {
            $controleur = new CtlrEntrerOeuvreEtape3();
        } elseif ($action == "entrerOeuvreEtape4") {
            $controleur = new CtlrEntrerOeuvreEtape4();
        } elseif ($action == "validerOeuvre") {
            $controleur = new CtlrValiderOeuvre();
        } elseif ($action == "insererOeuvre") {
            $controleur = new CtlrInsererOeuvre();
        } elseif ($action == "loginClient") {
            $controleur = new CtlrLoginClient();
        } elseif ($action == "seConnecter") {
            $controleur = new CtlrSeConnecter();
        } elseif ($action == "seConnecterAdmin") {
            $controleur = new CtlrSeConnecterAdmin();
        } elseif ($action == "deconnexion") {
            $controleur = new CtlrDeconnexion();
        } elseif ($action == "adminCatalogue") {
            $controleur = new CtlrAdminCatalogue();
        } elseif ($action == "loginAdmin") {
            $controleur = new CtlrLoginAdmin();

        } elseif ($action == "modifierOeuvre") {
            $controleur = new CtlrModifierOeuvre();
        } elseif ($action == "confirmerModifOeuvre") {
            $controleur = new CtlrConfirmerModifOeuvre();
        } elseif ($action == "validerModifOeuvre") {
            $controleur = new CtlrValiderModifOeuvre();
        } elseif ($action == "enregistrerModification") {
            $controleur = new CtlrEnregistrerModification();

        } elseif ($action == "choisirSuppressionOeuvre") {
            $controleur = new CtlrChoisirSuppressionOeuvre();
        } elseif ($action == "confirmerSuppressionOeuvre") {
            $controleur = new CtlrConfirmerSuppressionOeuvre();
        } elseif ($action == "suppressionOeuvre") {
            $controleur = new CtlrSuppressionOeuvre();
        } elseif ($action == "deconnexionAdmin") {
            $controleur = new CtlrdeconnexionAdmin();
        } elseif ($action == "creerCompteClient") {
            $controleur = new CtlrCreerCompteClient();
        } elseif ($action == "confirmerCommande") {
            $controleur = new CtlrConfirmCommande();
        } elseif ($action == "ajouterOeuvreAuPanier") {
            $controleur = new CtlrAjouterOeuvreAuPanier();
        } elseif ($action == "panier") {
            $controleur = new CtlrPanier();
        } else {
            $controleur = new CtlrAccueilDefaut();
        }
        return $controleur;
    }

}
