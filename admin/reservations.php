<?php
include("../includes/db_connect.php"); // connexion à ta base
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/css/style3.css">
<link rel="stylesheet" href="../assets/css/style2.css">
<title>Gestion des Réservations</title>
<style>
/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    margin-top: 10px;
}
thead tr {
    background: rgba(212, 175, 55, 0.12);
    border-bottom: 1px solid rgba(212, 175, 55, 0.3);
}
th {
    padding: 13px 16px;
    text-align: left;
    color: #d4af37;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
}
td {
    padding: 13px 16px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    color: rgba(255,255,255,0.85);
    font-size: 14px;
}
tbody tr:hover {
    background: rgba(255,255,255,0.04);
}

/* BUTTONS */
.btn-add {
    display: inline-block;
    margin-bottom: 18px;
    padding: 9px 18px;
    background: #d4af37;
    color: #061327;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: 0.2s;
}
.btn-add:hover { opacity: 0.85; }

.btn-edit {
    display: inline-block;
    padding: 6px 12px;
    background: rgba(21, 101, 192, 0.25);
    color: #64b5f6;
    border: 1px solid rgba(21, 101, 192, 0.4);
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    margin-right: 6px;
    transition: 0.2s;
}
.btn-edit:hover { background: rgba(21, 101, 192, 0.45); }

.btn-delete {
    display: inline-block;
    padding: 6px 12px;
    background: rgba(198, 40, 40, 0.25);
    color: #ef9a9a;
    border: 1px solid rgba(198, 40, 40, 0.4);
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    transition: 0.2s;
}
.btn-delete:hover { background: rgba(198, 40, 40, 0.45); }

/* TITRES */
.topbar h2 {
    color: white;
    margin-bottom: 4px;
}
.topbar p {
    color: rgba(255,255,255,0.7);
    margin-bottom: 20px;
}
.content h3 {
    margin-bottom: 18px;
    font-size: 16px;
    color: #d4af37;
}
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
    <h2>Gestion des Réservations</h2>
    <p>Liste complète des réservations</p>
  </div>

  <div class="content">
    <h3>📋 Liste des Réservations</h3>
    <a href="add_reservation.php" class="btn-add">➕ Ajouter une réservation</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Utilisateur</th>
          <th>Destination</th>
          <th>Date départ</th>
          <th>Nuits</th>
          <th>Adultes</th>
          <th>Enfants</th>
          <th>Type chambre</th>
          <th>Hôtel</th>
          <th>Notes</th>
          <th>Date réservation</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $result = $conn->query("SELECT * FROM reservations");
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . (int)$row['id'] . "</td>";
          echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
          echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
          echo "<td>" . htmlspecialchars($row['date_depart']) . "</td>";
          echo "<td>" . (int)$row['nb_nuits'] . "</td>";
          echo "<td>" . (int)$row['adultes'] . "</td>";
          echo "<td>" . (int)$row['enfants'] . "</td>";
          echo "<td>" . htmlspecialchars($row['type_chambre']) . "</td>";
          echo "<td>" . htmlspecialchars($row['hotel']) . "</td>";
          echo "<td>" . htmlspecialchars($row['notes']) . "</td>";
          echo "<td>" . htmlspecialchars($row['date_reservation']) . "</td>";
          echo "<td>
                  <a href='modifier_reservation.php?id=" . (int)$row['id'] . "' class='btn-edit'>✏️ Modifier</a>
                  <a href='supprimer_reservation.php?id=" . (int)$row['id'] . "' class='btn-delete'
                     onclick=\"return confirm('Confirmer la suppression ?')\">🗑️ Supprimer</a>
                </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='12'>Aucune réservation enregistrée pour l'instant.</td></tr>";
      }
      ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
