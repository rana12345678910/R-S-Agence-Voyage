<?php
include("../includes/db_connect.php"); // connexion à ta base

// Vérifier si un ID est passé
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM reservations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $reservation = $result->fetch_assoc();
} else {
    die("❌ Réservation introuvable.");
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination   = $_POST['destination'];
    $date_depart   = $_POST['date_depart'];
    $nb_nuits      = $_POST['nb_nuits'];
    $adultes       = $_POST['adultes'];
    $enfants       = $_POST['enfants'];
    $type_chambre  = $_POST['type_chambre'];
    $hotel         = $_POST['hotel'];
    $notes         = $_POST['notes'];

    $sql = "UPDATE reservations 
            SET destination=?, date_depart=?, nb_nuits=?, adultes=?, enfants=?, type_chambre=?, hotel=?, notes=? 
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiisssi", $destination, $date_depart, $nb_nuits, $adultes, $enfants, $type_chambre, $hotel, $notes, $id);
    $stmt->execute();

    header("Location: reservations.php?success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/css/style3.css">
<title>Modifier Réservation</title>
<style>
form {
    max-width: 600px;
    margin: 20px auto;
    background: rgba(255,255,255,0.05);
    padding: 20px;
    border-radius: 10px;
}
label {
    display: block;
    margin-bottom: 6px;
    color: #d4af37;
    font-weight: 600;
}
input, select, textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 14px;
    border-radius: 6px;
    border: 1px solid rgba(255,255,255,0.2);
    background: #061327;
    color: white;
}
.btn-submit {
    display: inline-block;
    padding: 9px 18px;
    background: #d4af37;
    color: #061327;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    border: none;
    cursor: pointer;
}
.btn-submit:hover { opacity: 0.85; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
  <nav>
    <a href="dashboard_admin.php">🏠 Dashboard</a>
    <a href="users.php">👥 Utilisateurs</a>
    <a href="hotel.php">🏨 Hôtels</a>
    <a href="reservations.php" class="active">📅 Réservations</a>
  </nav>
  <div class="sidebar-bottom">
    <p>Admin</p><span>Super Admin</span>
    <a href="../login.php" class="btn-logout">🚪 Se déconnecter</a>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
  <div class="topbar">
    <h2>Modifier Réservation</h2>
    <p>Mettre à jour les informations de la réservation</p>
  </div>

  <div class="content">
    <form method="POST">
        <label>Destination</label>
        <input type="text" name="destination" value="<?php echo htmlspecialchars($reservation['destination']); ?>" required>

        <label>Date de départ</label>
        <input type="date" name="date_depart" value="<?php echo htmlspecialchars($reservation['date_depart']); ?>" required>

        <label>Nombre de nuits</label>
        <input type="number" name="nb_nuits" value="<?php echo (int)$reservation['nb_nuits']; ?>" required>

        <label>Adultes</label>
        <input type="number" name="adultes" value="<?php echo (int)$reservation['adultes']; ?>" required>

        <label>Enfants</label>
        <input type="number" name="enfants" value="<?php echo (int)$reservation['enfants']; ?>" required>

        <label>Type de chambre</label>
        <input type="text" name="type_chambre" value="<?php echo htmlspecialchars($reservation['type_chambre']); ?>" required>

        <label>Hôtel</label>
        <input type="text" name="hotel" value="<?php echo htmlspecialchars($reservation['hotel']); ?>" required>

        <label>Notes</label>
        <textarea name="notes"><?php echo htmlspecialchars($reservation['notes']); ?></textarea>

        <button type="submit" class="btn-submit">💾 Enregistrer</button>
    </form>
  </div>
</div>

</body>
</html>
