# 🌍 S&R VOYAGES – Projet PHP

## 📖 Description
e projet est la transformation d’un site statique **HTML/CSS/JS** en une application web **PHP dynamique**.  
Il s’inscrit dans le cadre du cahier des charges du module JSPHP et respecte les exigences de gestion d’entités, d’interactions utilisateurs et d’administration.
---

## 🎯 Objectifs
- Offrir une plateforme de réservation intuitive
- Permettre aux utilisateurs de consulter et réserver
- Fournir une interface d’administration
- Respecter les bonnes pratiques de développement

---

## ⚙️ Fonctionnalités

### 👤 Côté Utilisateur
- Inscription et connexion
- Consultation du compte
- Réservation de voyages
- Navigation claire entre destinations
- Scripts JavaScript pour validation et interactivité

### 🛠️ Côté Administration
- Gestion des clients
- Gestion des produits/services (upload obligatoire)
- Gestion des réservations
- Affichage de statistiques

---

## 🗂️ Structure du projet
```
agence_voyage/
│
├── assets/
│   ├── css/          # Fichiers CSS (style.css, styles1.css)
│   ├── js/           # Scripts JavaScript (validation.js, main.js)
│   └── images/       # Logos et images des destinations
│
├── includes/
│   ├── header.php    # Barre de navigation factorisée
│   └── footer.php    # Pied de page factorisé
│
├── index.php         # Page d’accueil
├── reservation.php   # Formulaire de réservation
├── europe.php        # Page Europe
├── asie.php          # Page Asie
├── sousse.php        # Page Sousse
├── mahdia.php        # Page Mahdia
├── promos.php        # Page promotions
└── contact.php       # Page contact
```

---

## 🛠️ Technologies utilisées
- Frontend : HTML5, CSS3, JavaScript, FontAwesome
- Backend : PHP 8, MySQL
- Outils : Git, VS Code, phpMyAdmin

---

🚀 Installation
1. Cloner le dépôt :
```git clone https://github.com/tonpseudo/agence_voyage.git```
2. Placer le projet dans :
C:/xampp/htdocs/agence_voyage
3. Lancer Apache et MySQL via XAMPP.
4. Accéder au site :
http://localhost/agence_voyage/index.php
