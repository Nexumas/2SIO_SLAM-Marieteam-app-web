<?php

session_start();
//Variables
extract($_POST, EXTR_OVERWRITE);
//connexion
$config = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']) or die(mysqli_error($conn));
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
                        if(!empty($mdp2) && $mdp1 == $mdp2){

                                $pass = md5($mdp1);//encryption mot de passe
                        
                                $req = $conn->prepare("INSERT INTO utilisateur (estAdmin, nom, prenom, email, mot_de_passe)
                                VALUES (?,?,?,?,?)");
                                $req->bind_param("isssss", intval(FALSE), $nom, $prenom, $email, $pass, $email);
                                $req->execute();

                                header('Location:../connexion.php');
   
                        }else{
                            header('Location:../inscription.php');
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

                $reqConn = $conn->prepare("SELECT * from utilisateur where email = ? AND mot_de_passe = ?");
                $reqConn->bind_param("ss", $emailConn, $passConn);
                $reqConn->execute();
                $result = $reqConn->get_result();

                $value = array();

                if($result){
                    while($data = $result->fetch_assoc()){
                      if($data['email'] != $emailConn){
                        header('location:../Accueil.php');
                      }else{
                      array_push($value, $data['nom'], $data['prenom'], $data['email']);
                      $_SESSION['userName'] = $data['nom'];
                      $_SESSION['nbPoint'] = $data['nbPoint'];
                      $_SESSION['amdin'] = $data['estAdmin'];
                    }
                  }
                  $_SESSION['loggedin'] = true;
                  $_SESSION['user'] = $value;
                  header('location:../Accueil.php');
                }
                elseif(!$result){
                    echo 'erreur mot de passe ou email incorrect';
                }

            }
        }
    }

    elseif(isset($_POST['deconnexion'])){

    }

}


?>