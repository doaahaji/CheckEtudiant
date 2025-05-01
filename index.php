<<<<<<< HEAD
<!--
-- ---------------------------------------------------------------------------------------------------------------------
-- Ce fichier permet l'authentification des utilisateurs sur CheckEtudiant.
-- Il vérifie les identifiants saisis par l'utilisateur en les comparant aux données stockées dans la base de données.
-- En cas de succès, l'utilisateur est redirigé vers la page principale. Sinon, il est redirigé vers une page d'erreur.
-- ---------------------------------------------------------------------------------------------------------------------
-->

<?php
session_start();
include 'db.php';

if (isset($_SESSION['login'])) {
    header("Location: page2.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifiant = trim($_POST["identifiant"]);
    $password = md5(trim($_POST["password"]));

    $stmt = $pdo->prepare("SELECT * FROM Crendentiels WHERE Login = ? AND Password = ?");
    $stmt->execute([$identifiant, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['login'] = $user['Login'];
        header('Location: page2.php');
        exit();
    } else {
        header('Location: login_EROR.php');
        exit();
    }
}
?>

<?php include 'header.php'; ?>

<!-- Début code HTML -->
<main>
    <form action="index.php" method="POST">
        <label for="identifiant">Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Valider</button>
    </form>
</main>
<!-- Fin code HTML -->

=======
<!--
-- ---------------------------------------------------------------------------------------------------------------------
-- Ce fichier permet l'authentification des utilisateurs sur CheckEtudiant.
-- Il vérifie les identifiants saisis par l'utilisateur en les comparant aux données stockées dans la base de données.
-- En cas de succès, l'utilisateur est redirigé vers la page principale. Sinon, il est redirigé vers une page d'erreur.
-- ---------------------------------------------------------------------------------------------------------------------
-->

<?php
session_start();
include 'db.php';

if (isset($_SESSION['login'])) {
    header("Location: page2.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifiant = trim($_POST["identifiant"]);
    $password = md5(trim($_POST["password"]));

    $stmt = $pdo->prepare("SELECT * FROM Crendentiels WHERE Login = ? AND Password = ?");
    $stmt->execute([$identifiant, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['login'] = $user['Login'];
        header('Location: page2.php');
        exit();
    } else {
        header('Location: login_EROR.php');
        exit();
    }
}
?>

<?php include 'header.php'; ?>

<!-- Début code HTML -->
<main>
    <form action="index.php" method="POST">
        <label for="identifiant">Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Valider</button>
    </form>
</main>
<!-- Fin code HTML -->

>>>>>>> 9844f4f (Ajout des 3 dossiers depuis HAJI_Doaa)
<?php include 'footer.php'; ?>