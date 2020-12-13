<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Modification de la Traversée</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

</head>

<meta charset="utf-8" >
<meta name="Auteurs"
    content="Tharbla
             Twolf59" >
			 
<body>

	<!-- DEBUT NAVBAR - navbar créée avec bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <h1 class="navbar-brand" >MarieTeam</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="accueil.php">Accueil</a>
      </li>
	  <!-- DEBUT uniquement disponible pour les administrateurs-->
      <li class="nav-item">
        <a class="nav-link" href="admin/modification_traversees.php">Modifier la traversée<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="statistiques.php">Statistiques</a>
      </li>
	  <!-- FIN uniquement disponible pour les administrateurs-->
    </ul>

    <!-- DEBUT BOUTON D'INSCRIPTION -->
    <form class="form-inline">
    <button class="btn btn-sm btn-light" type="button"><a class="nav-link" href="inscription.php">Inscription</a></button>
    </form>
    <!-- FIN BOUTON D'INSCRIPTION -->
    
  </div>
</nav>
<!-- FIN NAVBAR - navbar créée avec bootstrap -->

<?php
if(isset($_SESSION['res_trav'])){
  $res_trav = $_SESSION['res_trav'];
  echo '<p>'.$res_trav[0].'</p>';
  echo '<form method="post" action="../server/process.php">';
  echo '<div class="form-group">';
  echo '<p>Date du départ : </p><input name="date" placeholder="'.$res_trav[2].'" type="text"/>';
  echo '<p>Heure du départ : </p><input name="heure" placeholder="'.$res_trav[3].'" type="text"/>';
  echo '<p>Durée de la traversé : </p><input name="duree" placeholder="'.$res_trav[4].'" type="text"/><p> minutes</p>';
  echo '<p>idLiaison : </p><input name="idLiaison" placeholder="'.$res_trav[6].'" type="text"/>';
  echo '<p>idBateau : </p><input name="idBateau" placeholder="'.$res_trav[7].'" type="text"/>';
  echo '<button class="btn btn-primary" name="modif" type="submit">Modifier</button></div></form>';
}
else{
	echo 'modification réalisée';
}
?>

</body>
</html>