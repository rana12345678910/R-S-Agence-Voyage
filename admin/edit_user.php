<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Modifier Utilisateur</title>
  <link rel="stylesheet" href="../assets/css/style3.css">
  <link rel="stylesheet" href="../assets/css/style2.css">
</head>
<body>

  <!-- SIDEBAR -->
  
    <aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
      <a href="dashboard_admin.php">🏠 Dashboard</a>
        <a href="users.php"  class="active">👥 Utilisateurs</a>
        <a href="hotel.php">      🏨 Hôtels</a>
        <a href="reservations.php">📅 Réservations</a>
    </nav>
    <div class="sidebar-bottom">
        <p>Admin</p><span>Super Admin</span>
        <a href="../connexion/login.php" class="btn-logout">🚪 Se déconnecter</a>
    </div>
</aside>
 

  <!-- MAIN -->
  <div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
      <div>
        <h2>Modifier l'utilisateur</h2>
        <p>Mettez à jour les informations du compte</p>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
      <div class="panel">
        <div class="panel-head">✏️ Informations du compte</div>
        <div class="form-body">
          <div class="row">
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" id="nom" placeholder="Ex : Dupont" />
            </div>
            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" id="prenom" placeholder="Ex : Jean" />
            </div>
          </div>

          <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" placeholder="Ex : jean.dupont@email.com" />
          </div>

          <div class="row">
            <div class="form-group">
              <label for="password">Nouveau mot de passe</label>
              <input type="password" id="password" placeholder="••••••••" />
            </div>
            <div class="form-group">
              <label for="confirm">Confirmer le mot de passe</label>
              <input type="password" id="confirm" placeholder="••••••••" />
            </div>
          </div>

          <div id="error-msg" style="display:none; color:#e05c5c; font-size:13px; margin-bottom:16px; padding:10px 14px; border-radius:8px; background:rgba(224,92,92,0.1); border:1px solid rgba(224,92,92,0.25);"></div>
          <div id="success-msg" style="display:none; color:#4caf87; font-size:13px; margin-bottom:16px; padding:10px 14px; border-radius:8px; background:rgba(76,175,135,0.1); border:1px solid rgba(76,175,135,0.25);"></div>

          <button class="btn-submit" onclick="handleSubmit()">Enregistrer les modifications</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function handleSubmit() {
      const nom     = document.getElementById('nom').value.trim();
      const prenom  = document.getElementById('prenom').value.trim();
      const email   = document.getElementById('email').value.trim();
      const pwd     = document.getElementById('password').value;
      const confirm = document.getElementById('confirm').value;

      const errEl  = document.getElementById('error-msg');
      const okEl   = document.getElementById('success-msg');

      errEl.style.display = 'none';
      okEl.style.display  = 'none';

      // Validations
      if (!nom || !prenom || !email) {
        showError('Veuillez remplir tous les champs obligatoires.');
        return;
      }

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        showError('L\'adresse e-mail n\'est pas valide.');
        return;
      }

      if (pwd || confirm) {
        if (pwd.length < 6) {
          showError('Le mot de passe doit contenir au moins 6 caractères.');
          return;
        }
        if (pwd !== confirm) {
          showError('Les mots de passe ne correspondent pas.');
          return;
        }
      }

      okEl.textContent = '✓ Les modifications ont été enregistrées avec succès.';
      okEl.style.display = 'block';
    }

    function showError(msg) {
      const errEl = document.getElementById('error-msg');
      errEl.textContent = '⚠ ' + msg;
      errEl.style.display = 'block';
    }
  </script>

</body>
</html>