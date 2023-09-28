<?php
session_start();

// Votre code de vérification d'authentification ici

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si l'utilisateur a confirmé la suppression de son compte
    if (isset($_POST['confirmation']) && $_POST['confirmation'] === 'oui') {
        // Votre code de suppression du compte ici
        // ...
        
        // Rediriger l'utilisateur vers une page de confirmation
        header('Location: compte_supprime.php');
        exit;
    }
}

// Afficher le formulaire de confirmation de suppression du compte
?>
<form method="post">
    <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
    <p>Confirmez en tapant "oui" :</p>
    <input type="text" name="confirmation" required>
    <button type="submit">Supprimer mon compte</button>
</form>
