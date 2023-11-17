
<?php
$titre = "Confirmer";
?>
    
    <title><?php echo $titre ?></title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <h3>Entrer les modifications</h3>
        <form action="?action=pageValiderModifOeuvre" method="post">
            <label for="titre">Titre</label><br>
            <input type="text" name="titre" id="titre" value="<?php echo $_SESSION['titre'] ?>"><span class="erreur"><?php echo $_SESSION['errTitre'] ?> </span><br>
            <label for="desc_oeuvre">Description</label><br>
            <input type="text" name="descOeuvre" id="desc_oeuvre" value="<?php echo $_SESSION['descOeuvre'] ?>"><span
                    class="erreur"><?php echo $_SESSION['errDescOeuvre'] ?> </span><br>
            <label for="prix">Prix</label><br>
            <input type="number" step="any" name="prix" id="prix" value="<?php echo $_SESSION['prix'] ?>"><span
                    class="erreur"><?php echo $_SESSION['errPrix'] ?> </span><br>
            <label for="date">Date de création</label><br>
            <input type="date" name="date" id="date" value="<?php echo $_SESSION['dateCreation'] ?>"><span class="erreur"><?php echo $_SESSION['errDate'] ?> </span><br>
            <label for="photo">Photo</label><br>
            <input type="text" name="photo" id="photo" value="<?php echo $_SESSION['url_photo'] ?>"><span class="erreur"><?php echo $_SESSION['errPhoto'] ?> </span><br>
            <label for="categorie">Catégorie</label><br>
            <select name="categorie" id="categorie">
                <option value="100">Monstres</option>
                <option value="200">Femmes</option>
                <option value="300">Hommes</option>
                <option value="400">Mctoffy</option>
                <option value="500">Cartes</option>
            </select>
            <input type="submit" value="Ajouter">
        </form>
    </main>
</div>
</body>
</html>