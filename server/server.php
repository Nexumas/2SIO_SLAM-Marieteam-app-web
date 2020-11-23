<?php

session_start();

//Variables
extract($_POST, EXTR_OVERWRITE);

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

                                $pass = md5($mdp1);//encryption mot de passe
                        
                                $req = "INSERT INTO utilisateur (estAdmin, nom, prenom, email, mot_de_passe, nbpoint) 
                                VALUES (FALSE,'".$nom."', '".$prenom."','".$email."', '".$pass."', '0')";
                                mysqli_query($conn, $req);
                                //header('location:Accueil.php');
                        }   
                    }
                }
            }
        }

      

    }

    elseif(isset($_POST['connexion'])){

        $emailConn = mysqli_real_escape_string($conn, $_POST['email']);
        $mdpConn = mysqli_real_escape_string($conn, $_POST['mdp']);

        if(!empty($email)){
            if(!empty($mdp)){

                $passConn = md5($mdpConn);

                $reqConn = "SELECT (nom, prenom) from utilisateur where '".$emailConn."' = email AND '".$passConn."' = mot_de_passe";

                mysqli_query($conn, $reqConn);

                echo $reqConn;

                if(reqConn){

                }
            }
        }
    }

}
?>