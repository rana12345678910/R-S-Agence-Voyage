<?php
session_start();
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && $password === $admin['mot_de_passe']) {

        $_SESSION['id'] = $admin['id'];
        $_SESSION['nom'] = $admin['nom'];
        $_SESSION['email'] = $admin['email'];
        $_SESSION['type'] = "admin";

        header("Location: ../admin/adminpage.php");
        exit;
    }

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['mot_de_passe'])) {

        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['type'] = "user";

        header("Location: ../user/userpage.php");
        exit;
    }

    $message = " Email ou mot de passe incorrect";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Connexion</title>
</head>
<body>


<nav>
    <div class="brand">
        <h1>S&R VOYAGES</h1>
    </div>
    <ul>
        <li><a href="signup.php">S'inscrire</a></li>
    </ul>
</nav>


<div class="auth-wrapper">
    <div class="auth-card">

        <div class="lock-icon">🔐</div>
        <h2>Connexion</h2>
        <p class="auth-subtitle">Bienvenue ! Entrez vos identifiants pour continuer</p>

       
        <?php if ($message != ""): ?>
            <p style="color:red; text-align:center;">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <form action="" method="POST">

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="mail@email.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
                <a href="#">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="auth-btn">Se connecter</button>
        </form>

        <div class="divider"></div>
        <p class="auth-footer">Pas encore de compte ? <a href="signup.php">S'inscrire gratuitement</a></p>

    </div>
</div>


<footer>
    &copy; 2026 S&R VOYAGES — Tous droits réservés.
</footer>

</body>
</html>
