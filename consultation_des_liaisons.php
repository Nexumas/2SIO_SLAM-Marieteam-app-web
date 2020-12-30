<?php
	session_start();
  
  $isConn = false;

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      $isConn = true;
      $nameUser = $_SESSION['userName'];
  } 
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    $isAdmin = true;
  }
  else{
      $isAdmin = false;
  }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Liaisons</title>
<link rel="stylesheet" href="css/style.css">
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
	<!-- DEBUT NAVBAR -->
  <div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="index.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
        <?php 
          if($isAdmin){
            echo '<a href="../admin/modification_traversees.php">MODIFIER TRAVERSEES</a>';
            echo '<a href="../admin/stats.php">STATISTIQUES</a>';
          }
          if($isConn){
            echo '<a href="../user/compte.php"><img src="images/profil.png" style="width: 15px; height: 15px;  vertical-align: middle;"> ' .$nameUser. '</a>'; 
            echo '<a href="../server/deconnexion.php">DECONNEXION</a>';
          }   
        ?>
    </div>
<!-- FIN NAVBAR  -->

<!-- DEBUT Sélection de secteur (dropdown)-->
<div><table><tbody>
	<tr>
		<td>
    <form method="post" action="server/process.php">
			<p>Veuillez Selectionner un secteur : <select name="secteur">
				<option value="1" >Poitoux Charente</button>
				<option value="2" >Seine-St-Denis</button>
			</p>
		</td>
<!-- FIN Sélection du secteur (dropdown)-->


<!-- DEBUT Sélection de la date-->

				<!-- Form code begins -->
				<div class="form-group">
				<td>
					<input class="form-control" id="date" name="date" placeholder="date de depart" type="date"/>
				</td>
				<td>
					<button class="btn btn-primary" name="submit" type="submit">Submit</button>
				</td>
				</div>
				</form>
				<!-- Form code ends --> 

				</div>
  </tr>
  
  

</tbody></table></div>
<div>
    <?php
      if(isset($_GET['secteur'])){
        if(isset($_GET['date'])){
          echo '<p>Resultat de recherche pour le secteur : '. $_GET['secteur'] . ' et la date de départ : '. $_GET['date'] . '</p>';
        }
      }
      ?>
  </div>

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
  $_SESSION['pour_trav'] = $_SESSION['res_liai'];
  unset($_SESSION['res_liai']);
}
?>
</div>

</body>
</html>