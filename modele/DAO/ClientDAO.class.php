<?php
/* Description : DAO pour la classe Client de la BD galerie
Date        : 21 octobre 2022
Auteurs      : Olivier Raymond et Elisabeth Tremblay
*/
// ****** INCLUSIONS *******

// Importe l'interface DAO et la classe Client.

include_once __DIR__ . "/DAO.interface.php";
include_once __DIR__ . "/../client.class.php";

// ****** CLASSE *******

class ClientDAO implements DAO
{

    // Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
    // Notes : 1) On retourne null si non trouvé,
    //         2) Si la clé primaire est composée, alors le paramètre est un tableau associatif
    // ici la seule $clés est un int représentant le code du Client.

    public static function chercher($cles)
    {
        // obtenir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // valeur par défaut pour la variable à retourner si non trouvée.
        $unClient = null;
        // Préparer une requête de type PDOStatement avec des paramètres SQL
        $requete = $connexion->prepare("SELECT * FROM client WHERE idClient=?");
        // Exécuter la requête
        $requete->execute(array($cles));
        // Analyser l’enregistrement, s’il existe et créer l’instance du client.
        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unClient = new Client(
                $enr['idClient'],
                $enr['nom'],
                $enr['prenom'],
                $enr['courriel'],
                $enr['adresse'],
                $enr['carteCredit'],
                $enr['dateInscription'],
                $enr['username'],
                $enr['mdPasse']
            );
        }

        // fermer le curseur de la requête
        $requete->closeCursor();
        //et fermer la connexion à la BD
        ConnexionBD::close();
        // retourner le client
        return $unClient;
    }

    public static function chercherLogin($nom_utilisateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        $unClient = null;
        $requete = $connexion->prepare("SELECT * FROM client WHERE username=?");
        $requete->execute(array($nom_utilisateur));
        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unClient = new Client(
                $enr['idClient'],
                $enr['nom'],
                $enr['prenom'],
                $enr['courriel'],
                $enr['adresse'],
                $enr['carteCredit'],
                $enr['dateInscription'],
                $enr['username'],
                $enr['mdPasse']
            );
        }
        $requete->closeCursor();
        ConnexionBD::close();
        return $unClient;
    }

    // Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD

    public static function chercherTous()
    {
        return self::chercherAvecFiltre("");

    }

    // Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.

    public static function chercherAvecFiltre($filtre)
    {
        // obtenir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // initialisation du tableau vide
        $tableau = [];
        // Préparer une requête de type PDOStatement avec des paramètres SQL
        // $filtre = "like %FFd%";
        //
        // $filtre = "WHERE"
        $requete = $connexion->prepare("SELECT * FROM client " . $filtre);
        // Exécuter la requête
        $requete->execute();
        // Analyser les enregistrements s'il y en a
        foreach ($requete as $enr) {
            $unClient = new Client(
                $enr['idClient'],
                $enr['nom'],
                $enr['prenom'],
                $enr['courriel'],
                $enr['adresse'],
                $enr['carteCredit'],
                $enr['dateInscription'],
                $enr['username'],
                $enr['mdPasse']
            );
            array_push($tableau, $unClient);
        }

        // fermer le curseur de la requête
        $requete->closeCursor();
        //et la connexion à la BD
        ConnexionBD::close();

        // retourner le tableau
        return $tableau;
    }

    // Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD

    public static function inserer($nvClient)
    {
        // on essaie d’établir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande insert
        $requete = $connexion->prepare("INSERT INTO client (nom, prenom, courriel, adresse, carteCredit, dateInscription, username, mdPasse) VALUES (?,?,?,?,?,?,?,?)");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $nvClient->getNom(), $nvClient->getPrenom(),
            $nvClient->getCourriel(), $nvClient->getAdresse(), $nvClient->getCarteCredit(),
            $nvClient->getDateInscription(), $nvClient->getUsername(), $nvClient->getMdPasse()
        ];
        return $requete->execute($tableauInfos);
    }

    // Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
    // Retourne true/false selon que l'opération a été un succès ou pas.
    public static function modifier($unClient)
    {

        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande update
        $requete = $connexion->prepare("UPDATE client SET nom=?, prenom=?, courriel=?,adresse=?,carteCredit=?, dateInscription=?, username=?, mdPasse=?  WHERE idClient=?");

        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $unClient->getNom(), $unClient->getPrenom(),
            $unClient->getCourriel(), $unClient->getAdresse(), $unClient->getCarteCredit(),
            $unClient->getDateInscription(), $unClient->getUsername(), $unClient->getMdPasse(), $unClient->getIdClient()
        ];
        return $requete->execute($tableauInfos);

    }
    // Cette méthode supprime l'objet reçu en paramètre de la table
    // Retourne true/false selon que l'opération a été un succès ou pas.
    public static function supprimer($unClient)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande delete (on utilise le code seulement comme paramètre)
        $requete = $connexion->prepare("DELETE FROM client WHERE idClient=?");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [$unClient->getIdClient()];
        return $requete->execute($tableauInfos);
    }
}


