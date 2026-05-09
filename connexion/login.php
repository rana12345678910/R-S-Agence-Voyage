<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Connexion</title>
    <style>
       
    </style>
</head>
<body>

<!-- Navbar -->
<nav>
    <div class="brand">
        <h1>S&R VOYAGES</h1>
    </div>
    <ul>
        
        <li><a href="signup.php">S'inscrire</a></li>
    </ul>
</nav>

<!-- Formulaire centré -->
<div class="auth-wrapper">
    <div class="auth-card">

        <div class="lock-icon">🔐</div>
        <h2>Connexion</h2>
        <p class="auth-subtitle">Bienvenue ! Entrez vos identifiants pour continuer</p>

        <form action="login.php" method="POST">

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="jean.dupont@email.com" required>
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

<!-- Footer -->
<footer>
    &copy; 2025 VoyageLux — Tous droits réservés.
</footer>

</body>
</html>