
<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Traversées</title>
<link rel="stylesheet" href="css/bootstrap.css">
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
        <a class="nav-link" href="modification_des_traversées.php">Modifier les traversées</a>
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

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">

    <!-- Form code begins -->
    <form method="post">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>
      <div class="form-group"> <!-- Submit button -->
        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      </div>
     </form>
     <!-- Form code ends --> 

    </div>
  </div>    
 </div>
</div>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

</body>
</html>