<?php $aff = $varconnect->prepare('SELECT * FROM latable ');
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
<h1>MOT DE PASSE RECUPERER avec succès !</h1>
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>mot de passe</th>
        </tr>
    </thead>
    <?php foreach ($delegues as $delegue): ?>
        <tr>
            <td><?= $delegue['mdp3']?></td>
        </tr>
    <?php endforeach;?>                  
</table>