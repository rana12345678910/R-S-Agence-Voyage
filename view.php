<?php
session_start();
include "connexion/db.php";


if(!isset($_SESSION['id'])){
    header("Location: connexion/login.php");
    exit();}


$id = $_SESSION['id'];


$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>

    <!-- Ton fichier CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<nav>
    <div class="brand">
        <h1 class="site-name">Mon Profil</h1>
    </div>

    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="connexion/logout.php">Déconnexion</a></li>
    </ul>
</nav>
<?php
if(isset($_SESSION['success'])){
    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
    unset($_SESSION['success']);
}
?>

<div class="auth-wrapper">

    <div class="auth-card">

        <div class="lock-icon">👤</div>

        <h2>Mes Informations</h2>

        <p class="auth-subtitle">
            Vous pouvez modifier ou supprimer votre compte
        </p>

        <form action="update.php" method="POST">

            <input type="hidden" name="id" value="<?= $user['id']; ?>">

            <div class="form-group">
                <label>Nom</label>

                <input 
                    type="text" 
                    name="nom"
                    value="<?= $user['nom']; ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label>Email</label>

                <input 
                    type="email" 
                    name="email"
                    value="<?= $user['email']; ?>"
                    required
                >
            </div>

              <div class="form-group">
                <label>Mot de passe</label>

                <input 
                    type="password" 
                    name="mot_de_passe"
                    placeholder="Nouveau mot de passe"
                >
            </div>


           

            <button type="submit" class="auth-btn">
                Modifier mes informations
            </button>

        </form>

        <div class="divider"></div>

        <form action="delete.php" method="POST">

            <input type="hidden" name="id" value="<?= $user['id']; ?>">

            <button 
                type="submit" 
                class="btn-del"
                onclick="return confirm('Voulez-vous supprimer votre compte ?')"
            >
                Supprimer mon compte
            </button>

        </form>

    </div>

</div>

</body>
</html>
