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
        
        
        $nom = htmlspecialchars($conn, $_POST['nom']);
        $prenom = htmlspecialchars($conn, $_POST['prenom']);
        $email = htmlspecialchars($conn, $_POST['email']);
        $mdp1 = htmlspecialchars($conn, $_POST['mdp']);
        $mdp2 = htmlspecialchars($conn, $_POST['mdp2']);

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
                               
                        }
                    }
                }
            }
        }

    }

}
?>