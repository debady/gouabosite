<?php
session_start();
$varconnect=new pdo ('mysql:host=localhost;dbname=mabd','root','');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateprofile'])) {

        $varRecuppseudo = $_POST['newpseudo'];
        $varRecupEmail = $_POST['nouvel_email'];
        if(!empty($varRecuppseudo) AND !empty($varRecupEmail))
        {
            $inser_new_info=$varconnect->prepare("UPDATE latable SET pseudo=? ,email = ? WHERE id=?");
            $inser_new_info->execute(array($varRecuppseudo,$varRecupEmail,$_SESSION['id']));

            header("Location:deconnect.php");

        }
        else {
            echo 'l un des champs est vide !';
        }
       /* $varVerifiemdp =sha1($_POST['confMDP']);

        $varRecupconnect =$varconnect->prepare('SELECT * FROM latable WHERE mdp1=?');
        $varRecupconnect->execute(array($varVerifiemdp));
        $varverifieexist = $varRecupconnect->rowCount();

        if($varverifieexist==1){
            $inser_new_info=$varconnect->prepare("UPDATE latable SET pseudo=? email = ?");
            $inser_new_info->execute(array($varRecuppseudo,$varRecupEmail));
            header("Location:profile.php");
        }else{
            echo "mot de passe inccorect !";
        }*/
    }
}

?>
<body>
<h1>Nouvelles Données</h1>
    <form method="post">

        <label for="newId">Votre ID:</label>
        <label for="#"><?php echo $_SESSION['id'] ?></label><br><br>

        <label>Nouveau pseudo :</label>
        <input type="text" name="newpseudo" value=<?php echo $_SESSION['pseudo'] ?>><br><br>

        <label for="nouvel_email">Nouvel email :</label>
        <input type="email" name="nouvel_email" value=<?php echo $_SESSION['email'] ?>><br><br>

        <!-- <label>confirmez votre mot de passe</label> -->
        <!-- <input type="password" name="confMDP"> <br> <br> -->

        <input type="submit" name="updateprofile" value="Mettre à jour">
    </form>

</body>

