<<<<<<< HEAD
<!--
-- -----------------------------------------------------------------------------------------
-- Fichier de connexion à la base de données MySQL.
-- Ce fichier établit une connexion avec la base de données `GesNotes` en utilisant PDO.
-- En cas d'échec, il affiche un message d'erreur et arrête l'exécution du script.
--
-- Paramètres :
-- * Serveur : localhost
-- * Base de données : GesNotes
-- * Utilisateur : root
-- * Mot de passe : (vide par défaut)
-- -----------------------------------------------------------------------------------------
-->

<?php
$host = 'localhost'; 
$dbname = 'GesNotes';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
=======
<!--
-- -----------------------------------------------------------------------------------------
-- Fichier de connexion à la base de données MySQL.
-- Ce fichier établit une connexion avec la base de données `GesNotes` en utilisant PDO.
-- En cas d'échec, il affiche un message d'erreur et arrête l'exécution du script.
--
-- Paramètres :
-- * Serveur : localhost
-- * Base de données : GesNotes
-- * Utilisateur : root
-- * Mot de passe : (vide par défaut)
-- -----------------------------------------------------------------------------------------
-->

<?php
$host = 'localhost'; 
$dbname = 'GesNotes';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
>>>>>>> 9844f4f (Ajout des 3 dossiers depuis HAJI_Doaa)
}