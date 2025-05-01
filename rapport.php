<<<<<<< HEAD
<!-- 
--------------------------------------------------------------------------------------
-- Ce fichier génère un rapport PDF contenant les notes d'un étudiant sélectionné.  
-- Il récupère les informations depuis la base de données et les affiche sous  
-- forme d’un document structuré avec FPDF, incluant une image si disponible.  
--------------------------------------------------------------------------------------
-->

<?php
require('fpdf/fpdf.php');
require('Db.php');

if (!isset($_GET['nom'])) {
    die("Nom de l'étudiant non spécifié.");
}

$nom = $_GET['nom'];

// Récupérer les données de l’étudiant depuis MySQL
$stmt = $pdo->prepare("SELECT * FROM Notes WHERE Nom = ?");
$stmt->execute([$nom]);
$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    die("Étudiant non trouvé.");
}

// Création du PDF
$pdf = new FPDF();
$pdf->AddPage();

// En-tête
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, "Rapport des Notes", 0, 1, 'C');
$pdf->Ln(10);

// Affichage de l'image si disponible
if (!empty($etudiant['Image'])) {
    $pdf->Image($etudiant['Image'], 80, 30, 50, 50);
    $pdf->Ln(60);
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Nom :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $etudiant['Nom'], 1, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Maths :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $etudiant['Maths'], 1, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Informatique :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $etudiant['Informatique'], 1, 1);

// Calculer la moyenne
$moyenne = ($etudiant['Maths'] + $etudiant['Informatique']) / 2;
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Moyenne :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, number_format($moyenne, 2), 1, 1);

// Déterminer l'observation
$observation = ($moyenne >= 10) ? "Admis" : "Ajourné";
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Observation :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $observation, 1, 1);

$pdf->Ln(10);

// Générer le PDF
$pdf->Output();
=======
<!-- 
--------------------------------------------------------------------------------------
-- Ce fichier génère un rapport PDF contenant les notes d'un étudiant sélectionné.  
-- Il récupère les informations depuis la base de données et les affiche sous  
-- forme d’un document structuré avec FPDF, incluant une image si disponible.  
--------------------------------------------------------------------------------------
-->

<?php
require('fpdf/fpdf.php');
require('Db.php');

if (!isset($_GET['nom'])) {
    die("Nom de l'étudiant non spécifié.");
}

$nom = $_GET['nom'];

// Récupérer les données de l’étudiant depuis MySQL
$stmt = $pdo->prepare("SELECT * FROM Notes WHERE Nom = ?");
$stmt->execute([$nom]);
$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    die("Étudiant non trouvé.");
}

// Création du PDF
$pdf = new FPDF();
$pdf->AddPage();

// En-tête
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, "Rapport des Notes", 0, 1, 'C');
$pdf->Ln(10);

// Affichage de l'image si disponible
if (!empty($etudiant['Image'])) {
    $pdf->Image($etudiant['Image'], 80, 30, 50, 50);
    $pdf->Ln(60);
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Nom :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $etudiant['Nom'], 1, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Maths :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $etudiant['Maths'], 1, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Informatique :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $etudiant['Informatique'], 1, 1);

// Calculer la moyenne
$moyenne = ($etudiant['Maths'] + $etudiant['Informatique']) / 2;
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Moyenne :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, number_format($moyenne, 2), 1, 1);

// Déterminer l'observation
$observation = ($moyenne >= 10) ? "Admis" : "Ajourné";
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Observation :", 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(140, 10, $observation, 1, 1);

$pdf->Ln(10);

// Générer le PDF
$pdf->Output();
>>>>>>> 9844f4f (Ajout des 3 dossiers depuis HAJI_Doaa)
?>