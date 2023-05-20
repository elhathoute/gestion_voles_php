<?php include('connexion.php');

// Fonction pour générer un token unique
function generateUniqueToken($length = 32) {
    $token = bin2hex(random_bytes($length));
    return $token;
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer l'adresse e-mail du formulaire
    $email = $_POST['email'];

    // Vérifier si l'adresse e-mail existe dans la base de données
    // ...// Vérifier si l'adresse e-mail existe dans la base de données
$email_exists_query = "SELECT * FROM users WHERE email = '$email'";
$email_exists_result = mysqli_query($conn, $email_exists_query);

if (mysqli_num_rows($email_exists_result) > 0) {
    // L'adresse e-mail existe dans la base de données
    // Vous pouvez continuer avec la génération du token et l'envoi de l'e-mail
} else {
    // L'adresse e-mail n'existe pas dans la base de données
    echo "Cette adresse e-mail n'est pas enregistrée. Veuillez vérifier votre saisie.";
}


    // Générer un token unique
    $token = generateUniqueToken();

    // Enregistrer le token dans la base de données ou l'associer à l'utilisateur, si nécessaire
    // ...

    // Envoyer l'e-mail avec le lien de réinitialisation contenant le token
    $subject = "Réinitialisation de mot de passe";
    $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : <a href='http://www.example.com/reset_password.php?token=$token'>Réinitialiser le mot de passe</a>";
    $headers = "From: your_email@example.com"; // Remplacez par votre adresse e-mail

    // Utilisez la fonction mail() ou une bibliothèque de messagerie pour envoyer l'e-mail
    if (mail($email, $subject, $message, $headers)) {
        echo "Un e-mail de réinitialisation de mot de passe a été envoyé à votre adresse e-mail.";
    } else {
        echo "Erreur lors de l'envoi de l'e-mail. Veuillez réessayer ultérieurement.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mot de passe oublié</title>
</head>
<body>
    <h1>Mot de passe oublié</h1>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Adresse e-mail" required>
        <input type="submit" name="submit" value="Réinitialiser le mot de passe">
    </form>
</body>
</html>

