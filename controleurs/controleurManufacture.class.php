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
        if ($action == "accueilCatalogue") {
            $controleur = new AccueilCatalogue();
        } elseif ($action == "pageFactureCommande") {
            $controleur = new FactureCommande();
        } elseif ($action == "pageEntrerOeuvre") {
            $controleur = new EntrerOeuvre();
        } elseif ($action == "pageValiderOeuvre") {
            $controleur = new ValiderOeuvre();
        } elseif ($action == "pageInsererOeuvre") {
            $controleur = new InsererOeuvre();
        } elseif ($action == "loginClient") {
            $controleur = new LoginClient();
        } elseif ($action == "seConnecter") {
            $controleur = new SeConnecter();
        } elseif ($action == "seConnecterAdmin") {
            $controleur = new SeConnecterAdmin();
        } elseif ($action == "deconnexion") {
            $controleur = new Deconnexion();
        } elseif ($action == "pageAdminCatalogue") {
            $controleur = new AdminCatalogue();
        } elseif ($action == "loginAdmin") {
            $controleur = new LoginAdmin();
        } elseif ($action == "pageModifierOeuvre") {
            $controleur = new ModifierOeuvre();
        } elseif ($action == "pageConfirmerModifOeuvre") {
            $controleur = new ConfirmerModifOeuvre();
        } elseif ($action == "pageValiderModifOeuvre") {
            $controleur = new ValiderModifOeuvre();
        } elseif ($action == "enregistrerModification") {
            $controleur = new EnregistrerModification();
        } elseif ($action == "pageChoisirSuppressionOeuvre") {
            $controleur = new ChoisirSuppressionOeuvre();
        } elseif ($action == "pageConfirmerSuppressionOeuvre") {
            $controleur = new ConfirmerSuppressionOeuvre();
        } elseif ($action == "suppressionOeuvre") {
            $controleur = new SuppressionOeuvre();
        } elseif ($action == "deconnexionAdmin") {
            $controleur = new deconnexionAdmin();
        } elseif ($action == "nouveauClient") {
            $controleur = new NouveauClient();
        } elseif ($action == "creerCompteClient") {
            $controleur = new CreerCompteClient();
        } elseif ($action == "confirmerCommande") {
            $controleur = new ConfirmCommande();
        } elseif ($action == "ajouterOeuvreAuPanier") {
            $controleur = new AjouterOeuvreAuPanier();
        } elseif ($action == "pagePanier") {
            $controleur = new Panier();
        } else {
            $controleur = new AccueilDefaut();
        }
        return $controleur;
    }

}
