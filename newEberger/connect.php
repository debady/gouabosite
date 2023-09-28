<?php 

if(isset($_POST['connect']))
{
    header('Location:traitementConnxion.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styA.css">
    <title>Formulaire de connexion</title>
</head>
<body>
    <h2>connectez vous maintenant</h2>
    <form action="traitementConnxion.php" method="post">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="mdp1" required><br><br>

        <input type="submit" value="Se connecter" name="connect"><h5>
        <h3><a href="inscript.php">je n'est pas de compte !</a> <a href="numberOrEmail.php">mot de passe oublié ?</a></h5>
        
    </form>
</body>
</html>
