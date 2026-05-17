<?php
include("../includes/db_connect.php"); // connexion à ta base
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/css/style2.css">
<title>Dashboard Admin</title>
<style>
.panel-head {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
}
.panel-head a {
    font-size:12px;
    color:#d4af37;
    text-decoration:none;
    font-weight:600;
}
.panel-head a:hover { text-decoration:underline; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
        <a href="dashboard_admin.php" class="active">🏠 Dashboard</a>
        <a href="users.php">👥 Utilisateurs</a>
        <a href="hotel.php">🏨 Hôtels</a>
        <a href="reservations.php">📅 Réservations</a>
    </nav>
    <div class="sidebar-bottom">
        <p>Admin</p><span>Super Admin</span>
        <a href="../login.php" class="btn-logout">🚪 Se déconnecter</a>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    <div class="topbar">
        <div><h2>Dashboard Admin</h2><p>S&R VOYAGES — Gestion</p></div>
        <input type="text" placeholder="🔍  Rechercher…">
    </div>

    <div class="content">

        <!-- UTILISATEURS -->
        <div class="panel" id="users">
            <div class="panel-head">👥 Utilisateurs <a href="users.php">Voir tout</a></div>
            <table>
                <thead>
                    <tr><th>Nom</th><th>Email</th><th>Date inscription</th></tr>
                </thead>
                <tbody>
                <?php
                $res = $conn->query("SELECT nom,email,date_inscription FROM users ORDER BY id DESC LIMIT 4");
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>".htmlspecialchars($row['nom'])."</td>
                                <td>".htmlspecialchars($row['email'])."</td>
                                <td>".htmlspecialchars($row['date_inscription'])."</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Aucun utilisateur</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- HÔTELS -->
        <div class="panel" id="hotels">
            <div class="panel-head">🏨 Hôtels <a href="hotel.php">Voir tout</a></div>
            <table>
                <thead>
                    <tr><th>Nom</th><th>Destination</th><th>Étoiles</th><th>Prix/nuit</th></tr>
                </thead>
                <tbody>
                <?php
                $res = $conn->query("SELECT nom,destination,etoiles,prix FROM hotels ORDER BY id DESC LIMIT 4");
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>".htmlspecialchars($row['nom'])."</td>
                                <td>".htmlspecialchars($row['destination'])."</td>
                                <td>".(int)$row['etoiles']." ⭐</td>
                                <td class='gold'>".htmlspecialchars($row['prix'])." €</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun hôtel</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- RÉSERVATIONS -->
        <div class="panel" id="reservations">
            <div class="panel-head">📅 Réservations <a href="reservations.php">Voir tout</a></div>
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
                    </tr>
                </thead>
                <tbody>
                <?php
                $res = $conn->query("SELECT * FROM reservations ORDER BY id DESC LIMIT 4");
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='gold'>#" . (int)$row['id'] . "</td>";
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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Aucune réservation</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</main>

</body>
</html>
