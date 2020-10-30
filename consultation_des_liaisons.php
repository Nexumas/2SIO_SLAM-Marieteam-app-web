<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Accueil</title>
<link rel="stylesheet" href="css/bootstrap.css">
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
        <a class="nav-link" href="accueil.php">Accueil<span class="sr-only">(current)</span></a>
      </li>
	  <!-- DEBUT uniquement disponible pour les administrateurs-->
      <li class="nav-item">
        <a class="nav-link" href="modification_des_liaisons.php">Modifier les liaisons</a>
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

<!-- DEBUT Sélection de secteur (dropdown)-->
<table><tbody>
	<tr>
		<td>
			<div class="dropdown">
			<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Veuillez sélectionner un secteur
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
				<button class="dropdown-item" type="button">Secteur 1</button>
				<button class="dropdown-item" type="button">Secteur 2</button>
				<button class="dropdown-item" type="button">...</button>
				<button class="dropdown-item" type="button">Secteur n</button>
			</div>
			</div>
		</td>
<!-- FIN Sélection du secteur (dropdown)-->

<!-- DEBUT Sélection de la date-->

		<td>
				<!-- Form code begins -->
				<form method="post">
				<div class="form-group">
				<table><tbody><tr>
					<label class="control-label" for="date">Date</label>
				</tr>
				<tr>
					<td>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
					</td>
					<td>
						<button class="btn btn-primary " name="submit" type="submit">Submit</button>
					</td>
				</div>
				</form>
				<!-- Form code ends --> 

				</div>
		</td>
	</tr>
</tbody></table>

<!-- FIN Sélection de la date-->

</body>
</html>