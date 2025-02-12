<?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = 'doaahj12';
            $pass = '10562003';
            $identifiant = $_POST["identifiant"];
            $password = $_POST["password"];
            if ($id == $identifiant && $pass == $password){
               header('location:page2.php');
            }
            else{
                echo '<h3 style="color: red;">Votre login et mot de passe sont incorrects</h3>';
            }
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
        <form action="index.php" method="POST">
            <label for="identifiant">Identifiant :</label>
            <input type="text" id="identifiant" name="identifiant" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Valider</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 - CheckEtudiant | Vérifiez votre admission facilement</p>
    </footer>

</body>
</html>
