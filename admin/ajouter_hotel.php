<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/style3.css">
<title>Ajouter un Hôtel</title>
</head>
<body>
<?php
include("../includes/db_connect.php"); // fichier de connexion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom         = $_POST['nom'];
    $destination = $_POST['destination'];
    $prix        = $_POST['prix'];
    $etoiles     = $_POST['etoiles'];
    $type        = $_POST['type_chambre'];
    $image       = $_POST['image'];
    $description = $_POST['description'];

    $sql = "INSERT INTO hotels (nom, destination, prix, etoiles, type_chambre, image, description)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissss", $nom, $destination, $prix, $etoiles, $type, $image, $description);

    if ($stmt->execute()) {
        header("Location: hotel.php"); // redirection vers la liste
        exit;
    } else {
        echo "❌ Erreur : " . $conn->error;
    }
}
?>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
        <a href="dashboard_admin.php">🏠 Dashboard</a>
        <a href="add_user.php">👥 Utilisateurs</a>
        <a href="hotel.php" class="active">🏨 Hôtels</a>
        <a href="reservations.php">📅 Réservations</a>
    </nav>
    <div class="sidebar-bottom">
        <p>Admin</p><span>Super Admin</span>
        <a href="../login.php" class="btn-logout">🚪 Se déconnecter</a>
    </div>
</aside>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <h2>Ajouter un Hôtel</h2>
        <p>Créer un nouvel établissement</p>
    </div>

    <div class="content">
        <div class="panel">
            <div class="panel-head">➕ Nouveau Hôtel</div>
            <div class="form-body">
                <form action="ajouter_hotel.php" method="POST">
                    <!-- NOM -->
                    <div class="form-group">
                        <label>Nom de l'hôtel</label>
                        <input type="text" name="nom" placeholder="Ex : Riad Al Andalus" required>
                    </div>

                    <!-- DESTINATION + PRIX -->
                    <div class="row">
                        <div class="form-group">
                            <label>Destination</label>
                            <input type="text" name="destination" placeholder="Ex : Marrakech" required>
                        </div>
                        <div class="form-group">
                            <label>Prix / nuit (€)</label>
                            <input type="number" name="prix" placeholder="180" required>
                        </div>
                    </div>

                    <!-- ETOILES + TYPE -->
                    <div class="row">
                        <div class="form-group">
                            <label>Étoiles</label>
                            <select name="etoiles">
                                <option value="1">⭐ 1 étoile</option>
                                <option value="2">⭐⭐ 2 étoiles</option>
                                <option value="3">⭐⭐⭐ 3 étoiles</option>
                                <option value="4">⭐⭐⭐⭐ 4 étoiles</option>
                                <option value="5" selected>⭐⭐⭐⭐⭐ 5 étoiles</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type_chambre">
                                <option>Hôtel</option>
                                <option>Riad</option>
                                <option>Villa</option>
                                <option>Resort</option>
                            </select>
                        </div>
                    </div>

                    <!-- IMAGE -->
                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="text" name="image" placeholder="https://image.com/hotel.jpg">
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" placeholder="Description de l'hôtel..."></textarea>
                    </div>

                    <!-- BOUTON -->
                    <button type="submit" class="btn-submit">➕ Ajouter l'Hôtel</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
