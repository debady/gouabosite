<?php
// Vérifiez si l'utilisateur est connecté
$varconnect=new pdo ('mysql:host=localhost;dbname=mabd','root','');
session_start();


if (!isset($_SESSION['id'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: connect.php');
    exit;
}

if(isset($_POST['deconnexion']))
{
    header('Location:deconnect.php');
}

/*Récupérez les informations de l'utilisateur à partir de la base de données
$user_id = $_SESSION['id'];
// Remplacez 'votre_table_utilisateur' par le nom de votre table utilisateur
$query = "SELECT * FROM latable WHERE id = $user_id";
$result = mysqli_query($varconnect,$query);
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // Affichez les informations de l'utilisateur
    echo ' Pseudo: ' . $user['pseudo'] . '<br>';
    echo 'Email: ' . $user['email'] . '<br>';
    // Affichez la photo de profil de l'utilisateur
   # echo '<img src="' . $user['photo_profil'] . '" alt="Photo de profil">';
} else {
    echo 'Utilisateur introuvable.';
}*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleprofile.css">
    <title>profile personnelle</title>
</head>
<body>

    <img src="./image/moi.png" width="120"><br>
    <label>ID:</label><h4><?php echo $_SESSION['id'] ?></h4>

    <label>Pseudo : <h4><?php echo $_SESSION['pseudo'] ?></h4></label>
    <label>Email :  <h4></label><?php echo $_SESSION['email'];?></h4>

    <!-- <label>mdp1 : <h4></label><?php echo $_SESSION['mdp1'];?></h4> -->
    <!-- <labeml>mdp2 :</label><h4><?php echo $_SESSION['mdp3'];?></h4><br> <br> -->
    <a href="deconnect.php">DECONNECTER</a><br>
    <a href="updateProfile.php">METTRE A JOUR</a><br>
    <a href="suprim.php">SUPPRIMER</a><br> <br> <br>
    <img src="./image/ordi.png" width="120">
    <?php 
    if($_SESSION['id']==1)
    {
        echo '<a href="vueglobe.php">dasboard<a/>';
    }
    ?>
 
<?php /*
    <img src="./image/perso.png" width="120"><br>
    <img src="./image/pot.png" width="120"><br>

    <img src="./image/ordi.png" width="120"><br>
    <img src="./image/pl.jpg" width="120"><br>

    <img src="./image/cote.jpg" width="120"><br> */?>

    
</body>
</html>