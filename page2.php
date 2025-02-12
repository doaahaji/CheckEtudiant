<?php 
session_start();
$observation = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $nom = $_POST["etudiant"] ?? 'Inconnu'; 
    $note_math = $_POST["maths"] ?? 0; 
    $note_info = $_POST["informatique"] ?? 0;

    // Calcul de la moyenne
    $moy = ($note_math + $note_info) / 2;

    // La condition d'admission
    if ($moy >= 10){
        $observation = "Votre admission a été retenue.";
    } else {
        $observation = "Malheureusement, votre admission n'a pas été retenue.";
    }

    // Stocker les données dans une session pour les récupérer dans page3.php
    $_SESSION['nom'] = $nom;
    $_SESSION['moy'] = $moy;
    $_SESSION['observation'] = $observation;

    // Redirection vers la page des résultats
    header('Location: page3.php');
    exit();
}
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

    <main>
        <!-- Le formulaire soumet à page2.php -->
        <form action="page2.php" method="POST">
            <div class="form-group">
                <label for="etudiant">Étudiant</label>
                <input type="text" id="etudiant" name="etudiant" required>
            </div>
            <div class="form-group">
                <label for="maths">Maths</label>
                <input type="number" min="0" max="20" step="0.01" id="maths" name="maths" required>
            </div>
            <div class="form-group">
                <label for="informatique">Informatique</label>
                <input type="number" min="0" max="20" step="0.01" id="informatique" name="informatique" required>
            </div>
            <div class="buttons">
                <button type="submit" class="btn">Résultat</button>
                <button type="reset" class="btn">Annuler</button>
            </div>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 - CheckEtudiant | Vérifiez votre admission facilement</p>
    </footer>

</body>
</html>