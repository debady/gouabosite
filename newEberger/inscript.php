<?php 
session_start();
if(isset($_POST['envoyer']))

{



    if(empty($_POST['username']) AND empty($_POST['email']) AND empty($_POST['mdp1']) AND empty($_POST['mdp2']) )
    {
        $varerror="champs vide";
    }
    else
    {
        header("Location:traitementINscript.php");
    } 
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="traitementINscript.php" method="post" enctype="multipart/form-data">

        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="mail" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="mdp1" required><br><br>

        
        <label for="password2">Confirmer Mot de passe :</label>
        <input type="password" id="password2" name="mdp2" ><br><br>

        
        <label for="profile_picture">Photo de profil :</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required><br><br>

        <input type="submit" value="S'inscrire" name="envoyer"><h5><a href="connect.php">j'ai déjà un compte</a></h5>
    </form>
    <?php
    if(isset($varerror))
    {
        echo $varerror;
    }
    
    ?>
</body>
</html>
