<?php

?>

<!DOCTYPE html>
<html>
<head>
<title>MarieTeam - Inscription</title>


<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css">

</head>

<body style="background-image: url('imgs/background.jpg'); background-size: cover; background-repeat: no-repeat;">


<div class="headform">
  <h2>Inscription</h2>
</div>


<form method="post" action="server/server.php">

  <div class="form-group">
    <label for="nom">Nom </label>
    <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" required>
  </div>
  <div class="form-group">
    <label for="prenom">prenom </label>
    <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prenom" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe </label>
    <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe" required>
  </div>
  <div class="form-group">
    <label for="mpd2">Confirmer Mot de passe </label>
    <input type="password" class="form-control" name="mdp2" placeholder="Confirmer votre mot de passe" required>
  </div>
  <button type="submit" class="btn btn-primary" name="inscription" class="align-content-center">S'inscrire</button>

</form>

</body>

</html>