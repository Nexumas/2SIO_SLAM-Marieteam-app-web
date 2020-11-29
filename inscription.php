<?php

?>

<!DOCTYPE html>
<html>
<head>
<title>MarieTeam - Inscription</title>


<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="Accueil.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
    </div>

<div class="headform">
  <h2>Inscription</h2>
</div>


<form method="post" action="server/server.php" class="nform">

  <div class="form-group">
    <label for="nom">Nom </label>
    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
  </div>
  <div class="form-group">
    <label for="prenom">Nom </label>
    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre nom">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe </label>
    <input type="password" class="form-control" id="mdp" placeholder="Entrez votre mot de passe">
  </div>
  <div class="form-group">
    <label for="mpd2">Confirmer Mot de passe </label>
    <input type="password" class="form-control" id="mdp2" placeholder="Confirmer votre mot de passe">
  </div>
  <button type="submit" class="btn btn-primary" name="inscription" class="align-content-center">S'inscrire</button>
</form>

</body>

</html>