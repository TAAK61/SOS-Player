<?php
session_start();
//Importation du fichier de connection à la base de donnée et du fichier contenant les fonctions
require_once(__DIR__ . "./config/connect.php");
require_once(__DIR__ . "./include/function.php");
if (isset($_POST["sign_in"])) {
  //Recuperation et Verification des donnée saisi par l'utilisateur
  $password = test_input($_POST["password"]);
  $login = test_input($_POST["login"]);
  //Verification de l'existance de l'utilisateur dans la base de donnée
  $requete = "select DISTINCT * from user where admin_login = :login and admin_password = :password";
  $resultat = $conn->prepare($requete);
  $resultat->execute(array('login' => $login, 'password' => $password));
  $row = $resultat->rowCount();
  //Si l'utilisateur existe on enregitre ces donnée en session et le redirige vers page prive 
  if ($row == 1) {
    $_SESSION["login"] = $login;
    // si la case remember me à été cocher on enregistre les données en cookies
    if (isset($_POST["remember-me"])) {
    }
    header("location:prive.php");
  } else {
    $erreur = "Erreur de login ou de mot de passe!!!";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Toure kiame">
    <title>Buvette</title>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <!--Bootstrap link-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <!--Formulaire de connexion-->
    <form class="form-signin" method="POST" action="signin.php">
        <img class="mb-4" src="./img/logo.png" alt="" width="80" height="80">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputText" class="sr-only">Email address</label>
        <input type="text" id="inputText" class="form-control" placeholder="login" name="login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <?php
    if (isset($erreur)) {
    ?>
        <div class="erreur">
            <p>Mot de passe ou login invalide</p>
        </div>
        <?php
    }
    ?>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember-me"> Remember me
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="sign_in" value="sign_in">Sign in</button>
        <button class="btn btn-lg btn-primary btn-block"><a href="./index.php">Acceuil</a></button>
    </form>
</body>

</html>