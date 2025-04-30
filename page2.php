<?php
session_start();
include 'db.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

$index = null;
$nom = '';
$maths = '';
$informatique = '';
$image = '';

// Vérification si on modifie un étudiant
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM Notes WHERE ID = ?");
    $stmt->execute([$id]);
    $etudiant = $stmt->fetch();

    if ($etudiant) {
        $index = $id;
        $nom = $etudiant['Nom'];
        $maths = $etudiant['Maths'];
        $informatique = $etudiant['Informatique'];
        $image = $etudiant['Image']; 
    }
}

// Traitement du formulaire (ajout/modification)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $nom = trim($_POST['etudiant']);
    $note_math = (float)$_POST['maths'];
    $note_info = (float)$_POST['informatique'];
    $imagePath = $image; // Conserver l'image actuelle par défaut

    // Gestion de l'upload de l'image
    if (!empty($_FILES['image']['name'])) {
        // Supprimer l'ancienne image si elle existe
        if (!empty($image) && file_exists($image)) {
            unlink($image); // Suppression du fichier image existant
        }

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $imagePath = 'assets/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    if ($index !== null) {
        // Modifier un étudiant
        $stmt = $pdo->prepare("UPDATE Notes SET Nom = ?, Maths = ?, Informatique = ?, Image = ? WHERE ID = ?");
        $stmt->execute([$nom, $note_math, $note_info, $imagePath, $index]);
    } else {
        // Ajouter un nouvel étudiant
        $stmt = $pdo->prepare("INSERT INTO Notes (Nom, Maths, Informatique, Image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $note_math, $note_info, $imagePath]);
    }
    
    // Redirection vers la page des notes
    header('Location: page4.php');
    exit();
}
?>

<?php include 'header.php'; ?>

<!-- Début code HTML -->
<main>
    <div class="container">
        <h2><?php echo $index !== null ? 'Modifier un étudiant' : 'Ajouter un étudiant'; ?></h2>

        <form action="page2.php<?php echo $index !== null ? '?id=' . $index : ''; ?>" method="POST" enctype="multipart/form-data">
            <label for="etudiant">Nom :</label>
            <input type="text" id="etudiant" name="etudiant" value="<?= htmlspecialchars($nom) ?>" required>

            <label for="maths">Maths :</label>
            <input type="number" id="maths" name="maths" min="0" max="20" step="0.01" value="<?= htmlspecialchars($maths) ?>" required>

            <label for="informatique">Informatique :</label>
            <input type="number" id="informatique" name="informatique" min="0" max="20" step="0.01" value="<?= htmlspecialchars($informatique) ?>" required>
            
            <label for="image">Image :</label>
            <input type="file" id="image" name="image">
            
            <!-- Affichage de l'ancienne image si elle existe -->
            <?php if (!empty($image)): ?>
                <p>Image actuelle :</p>
                <img src="<?= htmlspecialchars($image) ?>" width="100">
            <?php endif; ?>

            <button type="submit" name="action" value="enregistrer">
                <?php echo $index !== null ? 'Modifier' : 'Ajouter'; ?>
            </button>
            <button><a href="page4.php" class="button">Afficher la liste</a></button>
            <button><a href="logout.php" class="button">Déconnexion</a></button>
        </form>
    </div>
</main>
<!-- Fin code HTML -->

<?php include 'footer.php'; ?>