    <title>Confirmer</title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <?php
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    ?>
    <main>
        <h3>Voici les informations mise à jour</h3>
        <table>
            <tr>
                <th>Titre</th>
                <td><?php echo $_POST['titre'] ?></td>
            </tr>
            <tr>
                <th>description</th>
                <td><?php echo $_POST['descOeuvre'] ?></td>
            </tr>
            <tr>
                <th>Prix</th>
                <td><?php echo $_POST['prix'] ?></td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td><?php echo $_POST['date'] ?></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><?php echo $_POST['photo'] ?></td>
            </tr>
            <tr>
                <th>Categorie</th>
                <td><?php echo $_POST['categorie'] ?></td>
            </tr>
        </table>
        <?php
        $_SESSION['titre'] = $_POST['titre'];
        $_SESSION['descOeuvre'] = $_POST['descOeuvre'];
        $_SESSION['prix'] = $_POST['prix'];
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['photo'] = $_POST['photo'];
        $_SESSION['categorie'] = $_POST['categorie'];
        ?>
        <form action="?action=pageConfirmerModifOeuvre" method="post">
            <input type="submit" value="Corriger">
        </form>
        <form action="?action=enregistrerModification" method="post">
            <input type="submit" value="Confirmer">
        </form>
    </main>
</div>
</body>
</html>