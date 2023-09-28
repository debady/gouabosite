<?php
session_start();
$varconnect=new pdo ('mysql:host=localhost;dbname=mabd','root','');
// Récupérer les données du formulaire

if(!empty($_POST['email']) AND 
!empty($_POST['mdp1'])
)
{
    $varRecupemail =htmlspecialchars($_POST['email']);
    $varRecupmdp1 =sha1($_POST['mdp1']);
    
    $varRecupconnect =$varconnect->prepare('SELECT * FROM latable WHERE email=? AND mdp1=?');
    $varRecupconnect->execute(array($varRecupemail,$varRecupmdp1));

    $varverifieexist = $varRecupconnect->rowCount();
    if($varverifieexist==1){

        $_SESSION['profiles']=$userinfo['profiles'];
        
        $userinfo = $varRecupconnect->fetch();
        $_SESSION['id']=$userinfo['id'];

        $_SESSION['pseudo']=$userinfo['pseudo'];
        $_SESSION['email']=$userinfo['email'];

        $_SESSION['mdp1']=$userinfo['mdp1'];
        $_SESSION['mdp3']=$userinfo['mdp3'];
        $_SESSION['profiles']=$userinfo['profile'];

        if(($_SESSION['id'])!=1)
        {    
            header("Location: profile.php?id=".$_SESSION['id']);
        }else{
            header('Location:vueglobe.php');
        }
    }else{
        echo
        'Email ou mot de passe incorrect !<br>
        <h3><a href="inscript.php">s inscrire</a></h3>
        <h3><a href="connect.php">réesayer</a></h3>
        <h3><a href="updatePassword.php">mot de passe oublier ?</a></h3>';
    }
}else{
    echo "les champs doivent etre completer !";
}
#############verifcation de la connection


?>