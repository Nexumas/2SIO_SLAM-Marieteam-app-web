<!DOCTYPE html>
<html>
<head>
<title>MarieTeam - Connexion</title>


<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css">

</head>

<body style="background-image: url('imgs/background.jpg'); background-size: cover; background-repeat: no-repeat;">


<div class="headform">
  <h2>Connexion</h2>
</div>


<form method="post" action="server/server.php">

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe </label>
    <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe" required>
  </div>
  <div class="form-group">
  <input type="checkbox" id="scales" name="scales"checked>
  <label for="scales">Se souvenir de moi</label>
  </div>

  <button type="submit" class="btn btn-primary" name="connexion" class="align-content-center">S'inscrire</button>

  <div class="form-group">
      <a href="inscription.php" style="font-size: 80%;">vous n'avez pas de compte ?</label>
  </div>
</body>

</form>


</html>