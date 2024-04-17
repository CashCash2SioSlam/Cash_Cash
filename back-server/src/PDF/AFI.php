<?php
session_start();
require("Lib_FPDF/fpdf.php");
class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        // Logo
        $this->Image('../../../front-server/src/assets/logo.png', 8, 5, 50);
        // Police Arial gras 15
        $this->SetFont('Poppins', 'B', 15);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(87, 10, 'Attestation de fin de formation', 1, 0, 'B');
        // Saut de ligne
        $this->Ln(30);
        // Décalage à gauche
        $this->Cell(10);
        $this->SetFont('Poppins', '', 11); //here font body
        //Date du jour
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        $date_du_jour = mb_convert_encoding(date('d/m/Y', time()), 'ISO-8859-1', 'UTF-8');
        $this->SetXY(45, 39);
        $this->Cell(0, 0, $date_du_jour, 0, 0, 'L');
        $this->Text(15, 40, mb_convert_encoding("Télécharger le :", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 70, mb_convert_encoding("Attestation de fin de formation (Article L. 6353-1 du Code du travail)", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 80, mb_convert_encoding("Je soussigné, Mr Yoann FRANCOIS,", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 85, mb_convert_encoding("représentant l'organisme de formation HELFY, n° de déclaration d'activité 31.62.01828.62, ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(55, 95, mb_convert_encoding($_SESSION['prenom'], 'ISO-8859-1', 'UTF-8') . " " . mb_convert_encoding($_SESSION['nom'], 'ISO-8859-1', 'UTF-8'), 0, 1, mb_convert_encoding("Atteste que [le/la] stagiaire [Madame/Monsieur]", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 105, mb_convert_encoding(" exerçant les fonctions ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 110, mb_convert_encoding("de [fonction], a suivi la formation [intitulé et référence de la formation], ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 115, mb_convert_encoding("Du [date de début de la formation] au [date de fin de la formation] [année]. ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 120, mb_convert_encoding("Objectifs de la formation ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 125, mb_convert_encoding("Reprendre les indications mentionnées dans le programme de formation: ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 135, mb_convert_encoding("- [Objectif n° 1]", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 145, mb_convert_encoding("- [Objectif nº 2]", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 155, mb_convert_encoding("- [Objectif n° 3] [Etc.]", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 165, mb_convert_encoding("Nature de la formation Reprendre les indications mentionnées dans le programme de", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 170, mb_convert_encoding(" formation. [Action d'adaptation et de développement des compétences ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 175, mb_convert_encoding(", d'entretien des connaissances, de qualification de conversion, etc.).", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 180, mb_convert_encoding("Résultats de l'évaluation des acquis de la formation [Compétence]: acquise ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 190, mb_convert_encoding("- [Etc.] Fait à (lieu], le [date] [Signature] [Cachet de l'organisme de ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 195, mb_convert_encoding("formation ou de l'entreprise]", 'ISO-8859-1', 'UTF-8'));
    }
    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Poppins italique 8
        $this->SetFont('Poppins', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AddFont('Poppins', '', 'Poppins-Regular.php');
$pdf->AddFont('Poppins', 'BI', 'Poppins-BoldItalic.php');
$pdf->AddFont('Poppins', 'B', 'Poppins-Bold.php');
$pdf->AddFont('Poppins', 'I', 'Poppins-Italic.php');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);


$pdf->output(); //need a target="_blank";