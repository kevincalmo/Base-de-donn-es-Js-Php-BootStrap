<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;','admin','admin');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = $_GET['id'];
    $recupArticles = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $recupArticles->execute(array($get_id));

    if($recupArticles->rowCount() > 0){ //S'il y a des articles
        $articleInfos = $recupArticles->fetch();
        $title = $articleInfos['title'];
        $contenu = $articleInfos['contenu'];
        str_replace('<br>', '',$articleInfos['contenu']);

        if(isset($_POST['valider'])){
        $title_saisi = htmlspecialchars($_POST['title']);
        $description_saisi = nl2br(htmlspecialchars($_POST['description']));

        $updateArticle = $bdd->prepare('UPDATE articles SET title = ? , contenu = ? WHERE id = ?');
        $updateArticle->execute(array($title_saisi,$description_saisi,$get_id));

        header('Location: afficherArticles.php');
        }
        

    }else {
        echo "Aucun article trouver !";
    }
}else {
    echo "L'identifiant n'as pas été récupéré !";
}

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
    <title>Modifier Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./../../CSS-Surplus/modifArticles.css">
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
             <label for="">Votre titre :</label>
             <input type="text" class="form-control" name="title" id="title" value="<?= $title;?>">
             <br>
             <label for="">Votre contenu : </label>
             <textarea name="description" class="form-control" id="description" cols="30" rows="10">
                 <?=  $contenu ?>
             </textarea><br>
             <button type="submit" class="btn btn-success" name="valider">Valider</button>
         </form>
    </div>
</body>
</html>