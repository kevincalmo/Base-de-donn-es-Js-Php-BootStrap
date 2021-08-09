<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;','admin','admin');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = $_GET['id'];
    $recupArticles = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $recupArticles->execute(array($get_id));

    if($recupArticles->rowCount() > 0){ //S'il y a des articles

        $supprArticle = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $supprArticle->execute(array($get_id));
        header('Location: afficherArticles.php');

    }else {
        echo "Aucun article trouver !";
    }
}else {
    echo "L'identifiant n'as pas été récupéré !";
}

if(!$_SESSION['password']){
    header('Location: connexion.php');
}