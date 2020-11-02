<?php

session_start();

//Variables
extract($_POST, EXTR_OVERWRITE);
$erreur = array();

//connexion
$config = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']) or die(mysqli_error($con));
mysqli_set_charset ($conn , "utf8");

//message confirmation de connxion -- Test
if(mysqli_errno($conn)){
    header("HTTP/1.1 500 Internal Server Error");
    //die('Error 403 - Echec de la connexion au serveur !');
}
else{
    //si formulaire INSCRIPTION confirmé
    if(isset($_POST['inscription'])){
        
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mdp1 = mysqli_real_escape_string($conn, $_POST['mdp']);
        $mdp2 = mysqli_real_escape_string($conn, $_POST['mdp2']);

        //gestion champs vide

        if(!empty($nom)){
            if(!empty($prenom)){
                if(!empty($email)){
                    if(!empty($mdp1)){
                        if(!$mdp1 != $mdp2){
                        if(count($erreur) == 0){

                                $pass = md5($mdp1);//encryption mot de passe
                        
                                $req = "INSERT INTO utilisateur (estAdmin, nom, email, nbpoint, prenom, mot_de_passe) 
                                VALUES (FALSE,'".$nom."',   '".$prenom."','".$email."', '".$pass."', '0')";
                                mysqli_query($conn, $req);

                                echo $req;
                                
                                echo '<p>connexion réussie !</p>';
                            }
                        
                        } else {
                            array_push($erreur, 'La confirmation ne correspond pas au mot de passe !');
                        }
                    } else {
                        array_push($erreur, 'Un mot de passe est requis !');
                    }
                } else {
                    array_push($erreur, 'Une adresse email est requise !');
                }
            } else {
                array_push($erreur, 'Le prenom est requis !');  
            }
        } else {
            array_push($erreur, 'Le nom est requis !');
        }

    }

    $_SESSION[$erreur];

}
?>