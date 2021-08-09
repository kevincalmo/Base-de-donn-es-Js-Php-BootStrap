<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;','admin','admin');

if(!$_SESSION['password']){
    header('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des membres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS-Surplus/membres.css">
</head>
<body>
    <div class="menu">
         <a href="./membres.php" class="btn btn-primary">Afficher tous les membres</a>
            <a href="./publierArticle.php" class="btn btn-primary">Publier un article</a>
            <a href="./afficherArticles.php" class="btn btn-primary">Afficher tous les articles</a>
            <a href="./logout.php" class="btn btn-danger">Déconnexion</a>
    </div>
           
    <div class="container">
    <h1 class="text-center bg-primary text-wrap text-white">Liste des membres</h1>
    <div class="liste-membres">
        <!-- Afficher tous les membres -->
    <?php
        $recupUsers = $bdd->query('SELECT * FROM membres');
        while($user = $recupUsers->fetch()){
            ?>
                <p><?= $user['pseudo'];?> <a class="btn btn-danger text-white" href="bannir.php?id= <?= $user['id'] ?>">Bannir</a></p>
            <?php
        }
    ?>
<!-- Fin Afficher tous les membres -->
    </div>


    </div>

</body>
</html>