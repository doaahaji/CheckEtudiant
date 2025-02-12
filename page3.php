<?php 
    session_start();

    // Récupération des valeurs stockées
    $nom = $_SESSION['nom'] ?? 'Inconnu';
    $moy = $_SESSION['moy'] ?? 0;
    $observation = $_SESSION['observation'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckEtudiant</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="logo-container">
            <img src="assets/logo.png" alt="Logo CheckEtudiant">
            <h1>CheckEtudiant</h1>
        </div>
    </header>

    <main class="result-container">
        <p class="welcome-text">Bienvenue <?= $nom ?></p>
        <p class="result-text">Votre Résultat est <strong><?=$moy ?></strong></p>
        <p class="status-text"><?= $observation ?></p>
    </main> 

    <footer>
        <p>&copy; 2025 - CheckEtudiant | Vérifiez votre admission facilement</p>
    </footer>
    

</body>
</html>