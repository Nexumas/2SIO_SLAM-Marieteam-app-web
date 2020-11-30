<?php
session_start();
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Liaisons</title>
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
<div><table><tbody>
	<tr>
		<td>
    <form method="post" action="serveur/process.php"><div class="dropdown">
			<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Veuillez sélectionner un secteur
			</button>
		
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
				<button class="dropdown-item" type="button" name="Sc-001">Poitoux Charente</button>
				<button class="dropdown-item" type="button" name="Sc-002">Seine-St-Denis</button>
			</div>
			</div></form>
		</td>
<!-- FIN Sélection du secteur (dropdown)-->


<!-- DEBUT Sélection de la date-->

				<!-- Form code begins -->
				<form method="post" action="server/process.php">
				<div class="form-group">
				<td>
					<input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
				</td>
				<td>
					<button class="btn btn-primary " name="submit" type="submit">Submit</button>
				</td>
				</div>
				</form>
				<!-- Form code ends --> 

				</div>
	</tr>
</tbody></table></div>

<!-- FIN Sélection de la date-->
<div>
<?php
// $NbrCol : le nombre de colonnes
// $NbrLigne : le nombre de lignes
// -------------------------------------------------------

if(isset($_SESSION['res_liai'])) {
  $res_liai = $_SESSION['res_liai'];
  $cpt_liai = $_SESSION['cpt_liai'];
  echo '<table><tr>';
  echo '<td>| Port de départ |</td>';
  echo '<td>| Port de destination |</td>';
  echo '<td>| Distance parcourue (en miles marin) |</td>';
  echo '<td></td></tr>';
  for ($i=0; $i<$cpt_liai; $i++) {
    echo '<tr>';
    echo '<td>'.$res_liai[$i][1].'</td>';
    echo '<td>'.$res_liai[$i][2].'</td>';
    echo '<td>'.$res_liai[$i][3].'</td>';
    echo '<form method="post" action="server/process.php">';
    echo '<td><button name="nId" type="submit" value="'.$i.'">Accéder à la traversée</button>';
    echo '</form>';
    echo '</tr>';
  }
  echo '</table>';
  $_SESSION['pour_trav'] = $res_liai;
  unset($_SESSION['res_liai']);
}
?>
</div>

</body>
</html>