<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;','admin','admin');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recupUser->execute(array($get_id));

    if($recupUser->rowCount() > 0){

        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannirUser->execute(array($get_id));
        header('Location: membres.php');

    }else {
        echo "Aucun utilisateur trouver !";
    }
}else {
    echo "L'identifiant n'as pas été récupéré !";
}

if(!$_SESSION['password']){
    header('Location: connexion.php');
}