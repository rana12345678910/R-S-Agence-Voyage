<?php
include("../includes/db_connect.php"); // connexion à ta base

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id      = $_POST['user_id'];
    $destination  = $_POST['destination'];
    $date_depart  = $_POST['date_depart'];
    $nb_nuits     = $_POST['nb_nuits'];
    $adultes      = $_POST['adultes'];
    $enfants      = $_POST['enfants'];
    $type_chambre = $_POST['type_chambre'];
    $hotel        = $_POST['hotel'];
    $notes        = $_POST['notes'];

    $sql = "INSERT INTO reservations 
            (user_id, destination, date_depart, nb_nuits, adultes, enfants, type_chambre, hotel, notes) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issiiisss", $user_id, $destination, $date_depart, $nb_nuits, $adultes, $enfants, $type_chambre, $hotel, $notes);
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
<link rel="stylesheet" href="../assets/css/style2.css">
<title>Ajouter Réservation</title>
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
        <a href="../connexion/login.php" class="btn-logout">🚪 Se déconnecter</a>
    </div>
</aside>

<!-- MAIN -->
<div class="main">
  <div class="topbar">
    <h2>Ajouter une Réservation</h2>
    <p>Remplissez le formulaire pour créer une nouvelle réservation</p>
  </div>

  <div class="content">
    <form method="POST">
        <label>Utilisateur (ID)</label>
        <input type="number" name="user_id" required>

        <label>Destination</label>
        <input type="text" name="destination" required>

        <label>Date de départ</label>
        <input type="date" name="date_depart" required>

        <label>Nombre de nuits</label>
        <input type="number" name="nb_nuits" required>

        <label>Adultes</label>
        <input type="number" name="adultes" required>

        <label>Enfants</label>
        <input type="number" name="enfants" required>

        <label>Type de chambre</label>
        <input type="text" name="type_chambre" required>

        <label>Hôtel</label>
        <input type="text" name="hotel" required>

        <label>Notes</label>
        <textarea name="notes"></textarea>

        <button type="submit" class="btn-submit">💾 Enregistrer</button>
    </form>
  </div>
</div>

</body>
</html>
