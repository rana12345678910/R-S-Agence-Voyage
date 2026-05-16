<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    
    if ($password !== $confirm) {
        $message = " Les mots de passe ne correspondent pas";
    } else {

       
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = " Cet email est déjà utilisé";
        } else {

            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            
            $stmt = $conn->prepare("INSERT INTO users (nom, email, mot_de_passe) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nom, $email, $hashedPassword);

            if ($stmt->execute()) {
                $message = " Compte créé avec succès !";
            } else {
                $message = " Erreur: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Créer un compte</title>
</head>
<body>


<nav>
         <div class="brand">
            <img src="../assets/images/logo2.png" alt="Logo" class="logo">
            <h1 class="site-name"><a href="../index.php">S&R VOYAGES</a></h1>
        </div>
        
    <ul>
        <li><a href="login.php">Se connecter</a></li>
    </ul>
</nav>


<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Créer un compte</h2>
        <p class="auth-subtitle">Rejoignez-nous et commencez à explorer le monde</p>

        
        <?php if ($message != ""): ?>
            <p style="color:red; text-align:center;">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <form action="" method="POST">

            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="nom" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="mail@email.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Min. 6 caractères" required>
            </div>

            <div class="form-group">
                <label for="confirm">Confirmer le mot de passe</label>
                <input type="password" id="confirm" name="confirm" placeholder="Répétez votre mot de passe" required>
            </div>

            <button type="submit" class="auth-btn">Créer mon compte</button>
        </form>

        <div class="divider"></div>
        <p class="auth-footer">Déjà un compte ? <a href="login.php">Se connecter</a></p>

    </div>
</div>


<footer>
    &copy; 2026 S&R VOYAGES — Tous droits réservés.
</footer>

</body>
</html>
