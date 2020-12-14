<?php

session_start();

//Variables
extract($_POST, EXTR_OVERWRITE);

//connexion
$config = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']) or die(mysqli_error($conn));
$conn->set_charset('utf8');

//message confirmation de connexion -- Test
if(mysqli_errno($conn)){
    header("HTTP/1.1 500 Internal Server Error");
}

else{

    //inscription
    if(isset($_POST['inscription'])){
        
        
        $nomLogin = $conn->real_escape_string($_POST['nom']);
        $prenomLogin = $conn->real_escape_string($_POST['prenom']);
        $emailLogin = $conn->real_escape_string($_POST['email']);
        $mdp1Login = $conn->real_escape_string($_POST['mdp']);
        $mdp2Login = $conn->real_escape_string($_POST['mdp2']);

        //gestion champs vide
        if(!empty($nomLogin)){
            if(!empty($prenomLogin)){
                if(!empty($emailLogin)){
                    if(!empty($mdp1Login)){
                        if(!empty($mdp2Login) && $mdp1Login == $mdp2Login){

                            try{

                                $passLogin = md5($mdp1Login);//encryption mot de passe
                        
                                $reqLogin = $conn->prepare("INSERT INTO utilisateur (estAdmin, nom, prenom, email, mot_de_passe)
                                VALUES (?,?,?,?,?)");
                                $reqLogin->bind_param("issss", intval(FALSE), $nomLogin, $prenomLogin, $emailLogin, $passLogin);
                                $reqLogin->execute();

                                header('Location:../connexion.php');

                            }catch(Exception $e){
                                echo $e->getMessage();
                            }
   
                        }else{
                            header('Location:../inscription.php');
                        }  
                    }
                }
            }
        }

    }

    //connexion
    elseif(isset($_POST['connexion'])){

        $emailConn = $conn->real_escape_string($_POST['email']);
        $mdpConn = $conn->real_escape_string($_POST['mdp']);

        if(!empty($emailConn)){
            if(!empty($mdpConn)){

                try{

                    $passConn = md5($mdpConn);//encryption mot de passe

                    //requete vérification compte utilisateur
                    $reqConn = $conn->prepare("SELECT * from utilisateur where email = ? AND mot_de_passe = ?");
                    $reqConn->bind_param("ss", $emailConn, $passConn);
                    $reqConn->execute();

                    $resultConn = $reqConn->get_result();//recupere le resultat
                    $fetchConn = $resultConn->fetch_assoc();//fetch resultat

                    //resultats stockées dans un array si requete réussie
                    if($resultConn){
                        if($fetchConn['email'] != null && $fetchConn['mot_de_passe'] != null){

                            $tab_User = array();//declaration tableau 

                            array_push($tab_User, $fetchConn['nom'], $fetchConn['prenom'], $fetchConn['email']);

                            $_SESSION['userName'] = $fetchConn['nom'];
                            $_SESSION['nbPoint'] = $fetchConn['nbPoint'];
                            $_SESSION['admin'] = $fetchConn['estAdmin'];
                        
                            $_SESSION['loggedin'] = true;//passe la variable de verification a true
                            $_SESSION['user'] = $tab_User;//stocke les données utilisateur

                            header('location:../Accueil.php');
                        } 
                        else{
                            header('Location:../connexion.php');
                        }   
                    }
                    else if(!$resultConn){
                        header('Location:../connexion.php');
                    }
                }catch(Exception $e){
                    echo $e->getMessage();
                }

            }       
        }

    }
}

$conn->close();

?>