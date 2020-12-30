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
<title>MarieTeam - Modification de la Traversée</title>
<link rel="stylesheet" href="../css/style.css">
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
<?php 

if($isAdmin && $isConn){

echo '
  <div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="../Accueil.php">ACCUEIL</a>
        <a href="../consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="../apropos.php">A PROPOS</a>';
  echo '<a href="../user/compte.php">COMPTE :' .$nameUser. '</a>'; 
  echo '<a href="../server/deconnexion.php">DECONNEXION</a>';
  echo '<a href="../admin/modification_traversees.php">MODIFIER TRAVERSEES</a>';
  echo '<a href="../admin/stats.php">STATISTIQUES</a>';
  echo '</div>';

if(isset($_SESSION['aSupr'])){
  $testSupr = $_SESSION['aSupr'];
}
else{
  $testSupr = false;
}
if($testSupr == false){
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
    echo '<p>idPeriode : </p><input name="idPeriode" placeholder="'.$res_trav[8].'" type="text"/>';
    echo '<button style="background-color = #0000FF;" name="modif" type="submit">Modifier</button></div></form>';
    echo '<form method="post" action="../server/process.php"><button style="background-color = #FF0000;" name="supr" type="submit">Suprimer</button></form>';
  }
  else{
	  echo 'modification réalisée';
  }
}
else{
  echo '<p>Suprimmer la traversée ?</p>';
  echo '<form method="post" action="../server/process.php"><button style="background-color = #FF0000;" name="supprimer">OUI</button></form>';
  echo '<form method="post" action="../server/process.php"><button style="background-color = #0000FF;" name="annuler">NON</button></form>';
}

echo '</body>
</html>';
}else{
  header('location:../index.php');
}

?>