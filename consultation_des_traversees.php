<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Traversées</title>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



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
        <a href="Accueil.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
    </div>
<!-- FIN NAVBAR -->

<?php
if(isset($_SESSION['res_trav'])){
  $res_trav = $_SESSION['res_trav'];
  echo '<p>'.$res_trav[0].'</p>';
  echo '<p>Date du départ : '.$res_trav[2].'</p>';
  echo '<p>Heure du départ : '.$res_trav[3].'</p>';
  echo '<p>Durée de la traversé : '.$res_trav[4].' minutes</p>';
  echo '<p>Bateau : '.$res_trav[5].'</p>';
}
?>

<button><a href="reservation.php">Réserver</a></button>

</body>
</html>