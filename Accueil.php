<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Accueil</title>
<link rel="stylesheet" href="css/bootstrap.css">

<link rel="stylesheet" href="css/boostrap.css">

</head>

<body style="background: url('imgs/background.jpg'); background-size: cover; background-repeat: no-repeat;">

<!-- DEBUT NAVBAR - navbar créée avec bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <h1 class="navbar-brand" >MarieTeam</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="consultation_des_liaisons.php">Consulter les liaisons <span class="sr-only">(current)</span></a>
      </li>
	  <!--uniquement disponible pour les administrateurs DEBUT-->
      <li class="nav-item">
        <a class="nav-link" href="modification_des_liaisons.php">Modifier les liaisons</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="statistiques.php">Statistiques</a>
      </li>
	  <!--uniquement disponible pour les administrateurs FIN-->
    </ul>

    <!-- DEBUT BOUTON D'INSCRIPTION -->
    <form class="form-inline">
    <button class="btn btn-sm btn-light" type="button"><a class="nav-link" href="inscription.php">Inscription</a></button>
    </form>
    <!-- FIN BOUTON D'INSCRIPTION -->
    
  </div>
</nav>
<!-- FIN NAVBAR - navbar créée avec bootstrap -->

<!-- DEBUT BOUTON CONNEXION - bouton de connexion au centre de la page d'accueil -->
<div style ="height: 100%;">
  <div style="margin: 20%;">
    <div class="text-center">
      <a href="connexion.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Se Connecter</a>
    </div>
  </div>
</div>
<!-- FIN BOUTON CONNEXION - bouton de connexion au centre de la page d'accueil -->

</body>
</html>