<?php
session_start();
$varconnect=new pdo ('mysql:host=localhost;dbname=mabd','root','');
// Récupérer les données du formulaire

if(!empty($_POST['username']) AND
!empty($_POST['email']) AND
!empty($_POST['mdp1']) AND
!empty($_POST['mdp2'])){

    $varRecupPseudo =htmlspecialchars($_POST['username']);
    $varRecupemail =htmlspecialchars($_POST['email']);
    $varRecupmdp1 =sha1($_POST['mdp1']);
    $varRecupmdp2 =sha1($_POST['mdp2']);

    $tin=time();

    $photo = $_FILES['profile_picture'];
    $newName =$varRecupemail.'.png';
    $chemin ='C:/wamp64/www/newEberger/image/'.$newName;
   # $varRecupprofile =htmlspecialchars($_FILES['profile_picture']);

    if($varRecupmdp1==$varRecupmdp2)
    {
        $varFOUILLEe=$varconnect->prepare("SELECT * FROM latable WHERE email=?");
        $varFOUILLEe->execute(array($varRecupemail));
        $varVerifi=$varFOUILLEe->rowCount();


        if($varVerifi==0)
        {
            $varInser = $varconnect->prepare("INSERT INTO latable (pseudo, email, mdp1, mdp3,profiles) VALUES (?, ?, ?, ?, ?)");
            $varInser->execute(array($varRecupPseudo,$varRecupemail,$varRecupmdp1,$varRecupmdp2,$newName));
            move_uploaded_file($photo['tmp_name'], $chemin);
            echo 'inscrition reussie !';
            echo'<a href="connect.php">se connecter</a>';
           // header('Location:vueglobe.php');
        }
        else{
            echo 'ce utilisateur existe deja dans la base de données !!'; 
            echo'<a href="connect.php">Se connecter ?</a>';
        }

    }else{
        echo "les mot de passe ne corespond pas"."<br>";
        echo'<a href="inscript.php">réessayer</>';
    }
}
?>