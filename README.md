# 🌍 S&R VOYAGES – Projet PHP

## 📖 Description
Ce projet est la transformation d’un site statique **HTML/CSS/JS** en une application web **PHP dynamique**.  
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
├── admin/                          # Panneau d'administration
│   ├── add_reservation.php         # Formulaire d'ajout de réservation
│   ├── add_user.php                # Formulaire d'ajout d'utilisateur
│   ├── ajouter_hotel.php           # Formulaire d'ajout d'hôtel
│   ├── dashboard_admin.php         # Tableau de bord administrateur
│   ├── edit_user.php               # Modification des utilisateurs
│   ├── form_modifier.php           # Formulaire générique de modification
│   ├── hotel.php                   # Liste et gestion des hôtels
│   ├── modifier_hotel.php          # Mise à jour des données d'un hôtel
│   ├── modifier_reservation.php    # Mise à jour des données d'une réservation
│   ├── reservations.php            # Liste et gestion des réservations
│   ├── supprimer_hotel.php         # Suppression d'un hôtel
│   ├── supprimer_reservation.php   # Suppression d'une réservation
│   ├── supprimer_user.php          # Suppression d'un utilisateur
│   └── users.php                   # Liste et gestion des utilisateurs
│
├── assets/                         # Ressources statiques
│   ├── css/                        # Feuilles de style CSS
│   │   ├── style.css
│   │   ├── style2.css
│   │   ├── style3.css
│   │   └── styles1.css
│   ├── images/                     # Logos et images des destinations
│   └── videos/                     # Vidéos incluses dans le site
│
├── connexion/                      # Authentification et base
│   ├── agence_voyage_db.sql        # Script SQL de la base de données
│   ├── db.php                      # Connexion alternative
│   ├── login.php                   # Formulaire de connexion
│   ├── logout.php                  # Déconnexion
│   └── signup.php                  # Formulaire d'inscription
│
├── includes/
│   └── db_connect.php              # Connexion principale à la base
│
├── index.php                       # Page d’accueil
├── reservation.php                 # Formulaire de réservation
├── europe.php                      # Page Europe
├── asie.php                        # Page Asie
├── sousse.php                      # Page Sousse
├── mahdia.php                      # Page Mahdia
├── promos.php                      # Page promotions
├── contact.php                     # Page contact
├── delete.php                      # Suppression générique
├── update.php                      # Mise à jour générique
└── view.php                        # Vue détaillée (affichage)

```

---

## 🛠️ Technologies utilisées
- Frontend : HTML5, CSS3, JavaScript, FontAwesome
- Backend : PHP 8, MySQL
- Outils : Git, VS Code, phpMyAdmin

---

🚀 Installation
1. Cloner le dépôt :
```git clone https://github.com/rana12345678910/R-S-Agence-Voyage.git```
2. Placer le projet dans :
C:/xampp/htdocs/AgenceVoyage
3. Lancer Apache et MySQL via XAMPP.
4. Accéder au site :
http://localhost/AgenceVoyage/index.php
