# 📌 Gestion des Notes - GesNotes

## 📖 Description
Ce projet est une application web en PHP permettant de gérer les notes des étudiants. Il permet d'ajouter, modifier, supprimer et afficher les notes des étudiants. Il intègre également un système d'authentification sécurisé et la génération de rapports PDF.

## 📋 Fonctionnalités
- 🔐 Authentification sécurisée (mots de passe chiffrés en MD5)
- 📄 Gestion des étudiants (ajout, modification, suppression)
- 📊 Affichage des moyennes et observations
- 📷 Upload et gestion des images des étudiants
- 📃 Génération de rapports PDF des notes

## 🛠️ Technologies utilisées
- **Langage** : PHP
- **Base de données** : MySQL
- **Bibliothèque PDF** : FPDF
- **Frontend** : HTML, CSS

## 🚀 Installation
1. **Extraire le dossier**

2. **Configurer la base de données**
   - Créer une base de données MySQL nommée `gesNotes`
   - Importer le fichier `gesnotes.sql` disponible dans le projet
   - Vérifier les paramètres de connexion dans `db.php`

4. **Accéder à l'application**
   - Ouvrir un navigateur et aller sur : `http://localhost/chemin_dossier(HAJI_Doaa)

5. **Login**
   - Identifiant: doaa56
   - Mot de pass: 1056

## 📂 Structure du projet
```
GesNotes/
│── assets/            # Dossier contenant les images uploadées
│── fpdf/              # Bibliothèque pour la génération de PDF
│── db.php             # Connexion à la base de données
│── index.php          # Page d'authentification
│── page2.php          # Ajout / modification des étudiants
│── page4.php          # Liste des étudiants
│── rapport.php        # Génération du rapport PDF
│── logout.php         # Déconnexion
│── gesnotes.sql       # Script SQL pour créer la base de données
│── header.php         # En-tête du site
│── footer.php         # Pied de page
│── README.md          # Documentation du projet
```

## 📌 Utilisation
1. **Se connecter** avec un compte valide.
2. **Gérer les étudiants** : Ajouter, modifier ou supprimer leurs informations.
3. **Générer un rapport PDF** : Cliquer sur l'icône 📝 pour générer un rapport PDF des notes.

## 📦 Base de données
- Nom de la base : `gesNotes`
- Tables :
  - `Crendentiels` (Stocke les utilisateurs)
  - `Notes` (Stocke les informations des étudiants)
- Pour créer la base, importer `gesnotes.sql` dans MySQL.

## ✨ Auteur
Projet développé par **Doaa HAJI** 🎓
