<<<<<<< HEAD
<!-- 
--------------------------------------------------------------------------------------
-- Ce fichier gère la déconnexion des utilisateurs du site "CheckEtudiant".  
-- Il détruit la session en cours, supprime les variables de session et  
-- efface le cookie associé avant de rediriger l'utilisateur vers la page d'accueil.  
--------------------------------------------------------------------------------------
-->

<?php
session_start();

session_unset();
session_destroy();

setcookie('etudiants', '', time() - 3600, '/');

header("Location: index.php");
=======
<!-- 
--------------------------------------------------------------------------------------
-- Ce fichier gère la déconnexion des utilisateurs du site "CheckEtudiant".  
-- Il détruit la session en cours, supprime les variables de session et  
-- efface le cookie associé avant de rediriger l'utilisateur vers la page d'accueil.  
--------------------------------------------------------------------------------------
-->

<?php
session_start();

session_unset();
session_destroy();

setcookie('etudiants', '', time() - 3600, '/');

header("Location: index.php");
>>>>>>> 9844f4f (Ajout des 3 dossiers depuis HAJI_Doaa)
exit();