<?php
if(isset($_POST['emailrecupEnvoi']))
{
    if(!empty($_POST['emailrecup'])){
        $varRecupemail =htmlspecialchars($_POST['emailrecup']);

        $varRecupMdp =$varconnect->prepare('SELECT * FROM latable WHERE email=?');
        $varRecupMdp->execute(array($varRecupemail));
        $varverifieexist = $varRecupMdp->rowCount();
        $varverifieexist->fetch_all();

        if($varverifieexist==1){
            header('Location:transition.php');

        }
        else{
            echo 'compte introuvable';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperation par numero Email</title>
</head>
<body>
    <form action="#" method="post">
        <h1>Email</h1>
        <input type="email" name="emailrecup">
        <input type="submit" value="recevoir le code" name="emailrecupEnvoi">
    </form> 
</body>
</html>