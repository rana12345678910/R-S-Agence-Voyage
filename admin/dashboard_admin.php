<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&R VOYAGES</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <style>
        
    </style>
</head>
<body>

<!-- SIDEBAR -->
 <aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
      <a href="dashboard_admin.php" class="active">🏠 Dashboard</a>
        <a href="users.php"  >👥 Utilisateurs</a>
        <a href="hotel.php">      🏨 Hôtels</a>
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
            <div class="panel-head">👥 Utilisateurs <a href="add_user.php">+ Ajouter</a></div>
            <table>
                <thead>
                    <tr><th>Membre</th><th>Email</th><th>Rôle</th><th>Inscrit le</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="user-cell"><div class="av" style="background:linear-gradient(135deg,#d4af37,#b8962e)">SM</div><div><p>Sophie Martin</p><span>Paris, France</span></div></div></td>
                        <td>sophie.m@gmail.com</td><td>Client</td><td>8 mai 2025</td>
                       
                       <td>
                            <a href="edit_user.php" class="btn-edit">✏️ Modifier</a>
                            <button class="btn-del">🗑 Suppr.</button>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="user-cell"><div class="av" style="background:linear-gradient(135deg,#00bfff,#007aad)">LB</div><div><p>Lucas Bernard</p><span>Lyon, France</span></div></div></td>
                        <td>lucas.b@email.fr</td><td>Client</td><td>7 mai 2025</td>
                       
                        <td>
                            <a href="edit_user.php" class="btn-edit">✏️ Modifier</a>
                            <button class="btn-del">🗑 Suppr.</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <!-- HÔTELS -->
        <div class="panel" id="hotels">
            <div class="panel-head">🏨 Hôtels <a href="ajouter_hotel.php">+ Ajouter</a></div>
            <table>
                <thead>
                    <tr><th>Hôtel</th><th>Destination</th><th>Étoiles</th><th>Prix / nuit</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="user-cell"><div class="hotel-img">🏰</div><div><p style="color:white;font-weight:600">Riad Al Andalus</p><span style="color:rgba(255,255,255,0.4);font-size:11px">Médina</span></div></div></td>
                        <td>🇲🇦 Marrakech</td>
                        <td><span class="stars">★★★★★</span></td>
                        <td class="gold">180 €</td>
                        
                        <td>
                            <a href="edit_hotel.php" class="btn-edit">✏️ Modifier</a>
                            <button class="btn-del">🗑 Suppr.</button>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="user-cell"><div class="hotel-img">🗼</div><div><p style="color:white;font-weight:600">Hotel Shibuya Sky</p><span style="color:rgba(255,255,255,0.4);font-size:11px">Shibuya</span></div></div></td>
                        <td>🇯🇵 Tokyo</td>
                        <td><span class="stars">★★★★</span></td>
                        <td class="gold">210 €</td>
                        
                        <td>
                            <a href="edit_hotel.php" class="btn-edit">✏️ Modifier</a>
                            <button class="btn-del">🗑 Suppr.</button>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="user-cell"><div class="hotel-img">🌊</div><div><p style="color:white;font-weight:600">Caldera Blue Villa</p><span style="color:rgba(255,255,255,0.4);font-size:11px">Oia</span></div></div></td>
                        <td>🇬🇷 Santorin</td>
                        <td><span class="stars">★★★★★</span></td>
                        <td class="gold">320 €</td>
                       
                       <td>
                            <a href="edit_hotel.php" class="btn-edit">✏️ Modifier</a>
                            <button class="btn-del">🗑 Suppr.</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <!-- RÉSERVATIONS -->
        <div class="panel" id="reservations">
            <div class="panel-head">📅 Réservations <a href="#">Exporter</a></div>
            <table>
                <thead>
                    <tr><th>#</th><th>Client</th><th>Hôtel</th><th>nbre de nuits</th><th>adultes</th><th>enfants</th><th>Départ</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="gold">#1084</td>
                        <td>Sophie Martin</td><td>🏰 Riad Al Andalus</td><td>5</td><td>2</td><td>4</td>
                        <td>14 mai</td>
                       
                        <td><button class="btn-del">🗑</button></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

    </div>
</main>

</body>
</html>




   
    