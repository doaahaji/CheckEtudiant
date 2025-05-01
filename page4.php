<<<<<<< HEAD
<!-- 
-------------------------------------------------------------------------------------------------
-- Ce fichier affiche la liste des étudiants avec leurs moyennes et observations.  
-- L'utilisateur peut modifier, supprimer un étudiant ou générer un rapport PDF de ses notes.  
-- Seuls les utilisateurs authentifiés peuvent accéder à cette page.  
-------------------------------------------------------------------------------------------------
-->

<?php
session_start();
include 'db.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

// Suppression d'un étudiant
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM Notes WHERE ID = ?");
    $stmt->execute([$id]);
    header("Location: page4.php"); // Recharger la page après suppression
    exit();
}

// Récupération des étudiants depuis MySQL
$stmt = $pdo->query("SELECT ID, Nom, Maths, Informatique, Image FROM Notes ORDER BY Nom");
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC); //fatchAll pour récupérer toutes les lignes d'une requête SQL sous forme d'un tableau.

// Dernière modification
$dernierEtudiant = null;
if (isset($_SESSION['nom'], $_SESSION['moy'], $_SESSION['observation'])) {
    $dernierEtudiant = [
        'nom' => $_SESSION['nom'],
        'moyenne' => $_SESSION['moy'],
        'observation' => $_SESSION['observation']
    ];
    unset($_SESSION['nom'], $_SESSION['moy'], $_SESSION['observation']);
}
?>

<?php include 'header.php'; ?>

<!-- Début code HTML -->
<h2>Liste des étudiants</h2>

<?php if ($dernierEtudiant): ?>
    <p><strong>Dernière modification :</strong> <?= htmlspecialchars($dernierEtudiant['nom']) ?> - Moyenne : <?= number_format($dernierEtudiant['moyenne'], 2) ?> - <?= htmlspecialchars($dernierEtudiant['observation']) ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Moyenne</th>
            <th>Observation</th>
            <th>Image</th>
            <th>Actions</th>
            <th>Imprimé</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($etudiants)): ?>
            <tr><td colspan="6">Aucun étudiant enregistré.</td></tr>
        <?php else: ?>
            <?php foreach ($etudiants as $etudiant): ?>
                <?php 
                    $moyenne = ($etudiant['Maths'] + $etudiant['Informatique']) / 2; 
                    $observation = ($moyenne >= 10) ? "Admis" : "Non Admis";
                ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['Nom']) ?></td>
                    <td><?= number_format($moyenne, 2) ?></td>
                    <td><?= $observation ?></td>
                    <td>
                        <?php if (!empty($etudiant['Image'])): ?>
                            <img src="<?= htmlspecialchars($etudiant['Image']) ?>" width="50">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="page2.php?id=<?= $etudiant['ID'] ?>">✅ Modifier</a>
                        <a href="page4.php?delete=<?= $etudiant['ID'] ?>" onclick="return confirm('Supprimer cet étudiant ?')">❌ Supprimer</a>
                    </td>
                    <td>
                        <a href="rapport.php?nom=<?= urlencode($etudiant['Nom']) ?>" target="_blank">📝 Générer PDF</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<!-- Fin code HTML -->

=======
<!-- 
-------------------------------------------------------------------------------------------------
-- Ce fichier affiche la liste des étudiants avec leurs moyennes et observations.  
-- L'utilisateur peut modifier, supprimer un étudiant ou générer un rapport PDF de ses notes.  
-- Seuls les utilisateurs authentifiés peuvent accéder à cette page.  
-------------------------------------------------------------------------------------------------
-->

<?php
session_start();
include 'db.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

// Suppression d'un étudiant
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM Notes WHERE ID = ?");
    $stmt->execute([$id]);
    header("Location: page4.php"); // Recharger la page après suppression
    exit();
}

// Récupération des étudiants depuis MySQL
$stmt = $pdo->query("SELECT ID, Nom, Maths, Informatique, Image FROM Notes ORDER BY Nom");
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC); //fatchAll pour récupérer toutes les lignes d'une requête SQL sous forme d'un tableau.

// Dernière modification
$dernierEtudiant = null;
if (isset($_SESSION['nom'], $_SESSION['moy'], $_SESSION['observation'])) {
    $dernierEtudiant = [
        'nom' => $_SESSION['nom'],
        'moyenne' => $_SESSION['moy'],
        'observation' => $_SESSION['observation']
    ];
    unset($_SESSION['nom'], $_SESSION['moy'], $_SESSION['observation']);
}
?>

<?php include 'header.php'; ?>

<!-- Début code HTML -->
<h2>Liste des étudiants</h2>

<?php if ($dernierEtudiant): ?>
    <p><strong>Dernière modification :</strong> <?= htmlspecialchars($dernierEtudiant['nom']) ?> - Moyenne : <?= number_format($dernierEtudiant['moyenne'], 2) ?> - <?= htmlspecialchars($dernierEtudiant['observation']) ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Moyenne</th>
            <th>Observation</th>
            <th>Image</th>
            <th>Actions</th>
            <th>Imprimé</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($etudiants)): ?>
            <tr><td colspan="6">Aucun étudiant enregistré.</td></tr>
        <?php else: ?>
            <?php foreach ($etudiants as $etudiant): ?>
                <?php 
                    $moyenne = ($etudiant['Maths'] + $etudiant['Informatique']) / 2; 
                    $observation = ($moyenne >= 10) ? "Admis" : "Non Admis";
                ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['Nom']) ?></td>
                    <td><?= number_format($moyenne, 2) ?></td>
                    <td><?= $observation ?></td>
                    <td>
                        <?php if (!empty($etudiant['Image'])): ?>
                            <img src="<?= htmlspecialchars($etudiant['Image']) ?>" width="50">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="page2.php?id=<?= $etudiant['ID'] ?>">✅ Modifier</a>
                        <a href="page4.php?delete=<?= $etudiant['ID'] ?>" onclick="return confirm('Supprimer cet étudiant ?')">❌ Supprimer</a>
                    </td>
                    <td>
                        <a href="rapport.php?nom=<?= urlencode($etudiant['Nom']) ?>" target="_blank">📝 Générer PDF</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<!-- Fin code HTML -->

>>>>>>> 9844f4f (Ajout des 3 dossiers depuis HAJI_Doaa)
<?php include 'footer.php'; ?>