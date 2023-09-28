<?php
if (isset($_POST['updatemdp']))
{
    header('Location:recupmdpEmail.php');
}

if (isset($_POST['numbres']))
{
    header('Location:recupmdpNumber.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reinitialisation du mode passe </title>
</head>
<body>
    <h3>RECUPERER MON MOT DE PASSE</h3>
    <p>veuillez choisir la methode de recuperation</p>
    <form method="post">
        <input type="submit" value="PAR EMAIL" name="updatemdp">
        <input type="submit" value="PAR NUMERO" name="numbres">
    </form>
</body>
</html>