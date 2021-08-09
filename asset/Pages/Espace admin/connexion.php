<?php 
session_start();
if(isset($_POST['connexion'])){
    if( empty($_POST['name']) && empty($_POST['password']) ){
        ?> 
            <p class="bg-danger text-white text-center">
                Il vous manque un ou plusieurs champs !
            </p>
        <?php
    } else{
        $default_name = 'admin';
        $default_password = 'admin';
        $name_enter = htmlspecialchars($_POST['name']);
        $password_enter = htmlspecialchars($_POST['password']);

        if($default_name == $name_enter && $default_password == $password_enter) {

            $_SESSION['password']= $password_enter;
            header('Location: index.php'); //redirection vers le fichier index.php

        } else {
            ?> 
            <p class="bg-danger text-white text-center">
                Le champs 'name' ou le champ 'password' est incorrect!
            </p>
        <?php
        }
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
    <link rel="stylesheet" href="./../../CSS-Surplus/connexion.css">
</head>
<body class="bg-secondary">

<div class="container bg-primary">
    <h1 class="text-center bg-primary text-wrap">Espace membre</h1>
<form method="POST" action="">
  <div class="mb-3">
    
    <input type="text" name="name" placeholder="Votre nom d'utilisateur" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    
    <input type="password" placeholder="Votre mot de passe " name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="connexion" class="btn btn-secondary">Connexion</button>
</form>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>