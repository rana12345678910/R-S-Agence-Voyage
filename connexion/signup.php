<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Créer un compte</title>
    
</head>
<body>

<!-- Navbar -->
<nav>
    <div class="brand">
        <h1>S&R VOYAGES</h1>
    </div>
    <ul>
        
        <li><a href="login.php">Se connecter</a></li>
    </ul>
</nav>

<!-- Formulaire centré -->
<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Créer un compte</h2>
        <p class="auth-subtitle">Rejoignez-nous et commencez à explorer le monde</p>

        <form action="signup.php" method="POST">

            <div class="form-row">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Jean" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Dupont" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="jean.dupont@email.com" required>
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

<!-- Footer -->
<footer>
    &copy; 2025 VoyageLux — Tous droits réservés.
</footer>

</body>
</html>