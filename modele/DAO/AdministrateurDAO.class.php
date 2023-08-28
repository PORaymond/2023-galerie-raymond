<?php
/* Description : DAO pour la classe Administrateur de la BD galerie
Date        : 21 octobre 2022
Auteurs      : Olivier Raymond et Elisabeth Tremblay
*/

include_once(__DIR__."/DAO.interface.php");
include_once(__DIR__."/../administrateur.class.php");
class AdministrateurDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $unAdmin= null;
        // Préparer une requête de type PDOStatement avec des paramètres SQL
        $requete = $connexion->prepare('SELECT * FROM administrateur WHERE idAdmin=?');
        // Exécuter la requête
        $requete->execute(array($cles));
        // Analyser l’enregistrement, s’il existe et créer l’instance unAdmin
        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unAdmin = new Administrateur(
                $enr['idAdmin'],
                $enr['nom'],
                $enr['prenom'],
                $enr['username'],
                $enr ['mdPasse']
            );
        }
        // fermer le curseur de la requête
        $requete->closeCursor();
        //et fermer la connexion à la BD
        ConnexionBD::close();
        // retourner unAdmin
        return $unAdmin;
    }


    public static function chercherAvecFiltre($filtre)
    {
        // obtenir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        $tableau = [];

        $requete = $connexion->prepare("SELECT * FROM administrateur " . $filtre);
        $requete->execute();
        // Analyser les enregistrements s'il y en a
        foreach ($requete as $enr) {
            $unAdmin = new Administrateur(
                $enr['idAdmin'],
                $enr['nom'],
                $enr['prenom'],
                $enr['username'],
                $enr['mdPasse']
            );
            // ajouter les administrateurs dans le tableau un à la fois
            array_push($tableau, $unAdmin);
        }

        // fermer le curseur de la requête
        $requete->closeCursor();
        //et la connexion à la BD
        ConnexionBD::close();

        // retourner le tableau
        return $tableau;
    }
    public static function chercherLogin($nom_admin)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        $unAdmin = null;
        $requete = $connexion->prepare("SELECT * FROM administrateur WHERE username=?");
        $requete->execute(array($nom_admin));
        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unAdmin = new Administrateur(
                $enr['idAdmin'],
                $enr['nom'],
                $enr['prenom'],
                $enr['username'],
                $enr['mdPasse']
            );
        }
        $requete->closeCursor();
        ConnexionBD::close();
        return $unAdmin;
    }
    public static function chercherTous()
    {
        return self::chercherAvecFiltre("");
    }

    public static function inserer($unAdmin)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande insert
        $requete = $connexion->prepare("INSERT INTO 
            administrateur (nom,
                    prenom,
                    username,
                    mdPasse)
            VALUES (?,?,?,?)");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $unAdmin->getNom(),
            $unAdmin->getPrenom(),
            $unAdmin->getUsername(),
            $unAdmin->getMdPasse()
        ];
        return $requete->execute($tableauInfos);

    }

    public static function modifier($unAdmin)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande update
        $requete = $connexion->prepare("UPDATE administrateur SET nom=?, prenom=?, mdPasse=?  WHERE idAdmin=?");

        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $unAdmin->getNom(), $unAdmin->getPrenom(),$unAdmin->getMdPasse(), $unAdmin->getIdAdministrateur()
        ];
        return $requete->execute($tableauInfos);

    }

    public static function supprimer($unAdmin)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande delete (on utilise le code seulement comme paramètre)
        $requete = $connexion->prepare("DELETE FROM administrateur WHERE idAdmin=?");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [$unAdmin->getIdAdministrateur()];
        return $requete->execute($tableauInfos);
    }

}