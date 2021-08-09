<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;','admin','admin');

if(!$_SESSION['password']){
    header('Location: connexion.php');
}
if(isset($_POST['envoyer'])){
    if(!empty($_POST['title']) && !empty($_POST['description'])){
        $title = htmlspecialchars($_POST['title']);
        $description = nl2br(htmlspecialchars($_POST['description']));

        $insererArticle = $bdd->prepare('INSERT INTO articles(title,contenu) VALUES(?,?)');
        $insererArticle->execute((array($title,$description)));

        echo "L'article a bien été envoyer";
    } else {
        echo "Veuillez completer tous les champs !";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./../../CSS-Surplus/publierArticle.css">
</head>
<body>
<div class="menu">
         <a href="./membres.php" class="btn btn-primary">Afficher tous les membres</a>
            <a href="./publierArticle.php" class="btn btn-primary">Publier un article</a>
            <a href="./afficherArticles.php" class="btn btn-primary">Afficher tous les articles</a>
            <a href="./logout.php" class="btn btn-danger">Déconnexion</a>
    
    </div>
    <div class="container">
         <form action="" method="POST">
             <input type="text" class="form-control" name="title" id="title" placeholder="Le titre de votre article">
             <br>
             <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Votre article"></textarea><br>
             <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
         </form>
    </div>
   
</body>
</html>