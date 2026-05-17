<?php
include("../includes/db_connect.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: hotel.php");
    exit;
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM hotels WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: hotel.php");
    exit;
}

$hotel = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <title>Modifier un Hôtel</title>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
        <a href="dashboard_admin.php">🏠 Dashboard</a>
        <a href="users.php">👥 Utilisateurs</a>
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
        <h2>Modifier un Hôtel</h2>
        <p>Mettre à jour les informations de l'établissement</p>
    </div>

    <div class="content">
        <h3>✏️ Modifier l'hôtel</h3>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">❌ Une erreur est survenue. Veuillez réessayer.</div>
        <?php endif; ?>

        <form action="modifier_hotel.php" method="POST">
            <input type="hidden" name="id" value="<?= $hotel['id'] ?>">

            <div class="form-group">
                <label>Nom de l'hôtel</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($hotel['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label>Destination</label>
                <input type="text" name="destination" value="<?= htmlspecialchars($hotel['destination']) ?>" required>
            </div>

            <div class="form-group">
                <label>Type de chambre</label>
                <input type="text" name="type_chambre" value="<?= htmlspecialchars($hotel['type_chambre'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Nombre d'étoiles (1-5)</label>
                <input type="number" name="etoiles" min="1" max="5"
                       value="<?= htmlspecialchars($hotel['etoiles'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Prix / nuit (€)</label>
                <input type="number" step="0.01" name="prix" value="<?= htmlspecialchars($hotel['prix']) ?>" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4"><?= htmlspecialchars($hotel['description'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label>Image (URL ou nom du fichier)</label>
                <input type="text" name="image" value="<?= htmlspecialchars($hotel['image'] ?? '') ?>">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">💾 Enregistrer les modifications</button>
                <a href="hotel.php" class="btn-cancel">Annuler</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>