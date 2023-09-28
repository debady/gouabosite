<?php
session_start();
$varconnect=new pdo ('mysql:host=localhost;dbname=mabd','root','');

if (!isset($_SESSION['id']) AND $_SESSION['id']!=1){
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: connect.php');
    exit;
}

$aff = $varconnect->prepare('SELECT * FROM latable ');
$aff->execute();
$delegues = $aff->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau de bord</title>
</head>
<body>
<h1>ESPACE administrateur</h1>
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>ID</th>
            <th>PSEUDO</th>
            <th>EMAIL</th>
            <th>PROFILE</th>
            <!-- <th>MDP1</th> -->
            <!-- <th>MDP2</th> -->
        </tr>
    </thead>
    <?php foreach ($delegues as $delegue): ?>
        <tr>
            <td><?= $delegue['id']?></td>
            <td><?= $delegue['pseudo']?></td>
            <td><?= $delegue['email']?></td>
            <td><?= $delegue['profiles']?></td>
            <!-- <td><?= $delegue['mdp1']?></td> -->
            <!-- <td><?= $delegue['mdp3']?></td> -->
        </tr>
    <?php endforeach;?>                  
</table>

<!----------------------------------------- -->
    <a href="deconnect.php">DECONNECTER</a><br>
    <a href="updateProfile.php">METTRE A JOUR</a><br>
    <a href="profile.php">PROFILE</a><br>
    <a href="new.php">AJOUTER UTILISATEUR</a><br>
    <a href="suprim.php">SUPPRIMER</a><br>
</body>
</html>