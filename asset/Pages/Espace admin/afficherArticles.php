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
    <title>Afficher tous les articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./../../CSS-Surplus/afficheArticle.css">
</head>
<body>
<div class="menu">
         <a href="./membres.php" class="btn btn-primary">Afficher tous les membres</a>
            <a href="./publierArticle.php" class="btn btn-primary">Publier un article</a>
            <a href="./afficherArticles.php" class="btn btn-primary">Afficher tous les articles</a>
            <a href="./logout.php" class="btn btn-danger">Déconnexion</a>
    </div>
    <div class="container">
<?php 
    $recupArticles = $bdd->query('SELECT * FROM articles');
    while($article = $recupArticles->fetch()){
        ?>
        <div class="article" style="border: 1px solid black;">

            <h1><?= $article['title'];?></h1>
            <p><?= $article['contenu'];?></p>
            <div>
               <a href="./supprimerArticle.php?id=<?= $article['id'];?>">
            <button class="btn btn-danger">Supprimer l'article</button>
            </a>
            <a href="./modifierArticle.php?id=<?= $article['id'];?>">
            <button class="btn btn-warning">Modifier l'article</button>
            </a> 
            </div>
            
            <br>
            </div>

        
        <?php
    }
?>
</div>
</body>
</html>