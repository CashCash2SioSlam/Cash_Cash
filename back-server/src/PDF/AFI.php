<?PHP
session_start();
require("Lib_FPDF/fpdf.php");
class PDF extends FPDF
{
    // En-tête
    function Header()
    {

        $this->Image('../../../front-server/src/assets/logo.png', 8, 5, 50);
        $this->SetFont('Poppins', 'B', 15);
        $this->Cell(80);
        $this->Cell(87, 10, 'Fiche d intervention', 1, 0, 'B');
        $this->Ln(30);
        $this->Cell(10);
        $this->SetFont('Poppins', '', 11);
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        $date_du_jour = mb_convert_encoding(date('d/m/Y', time()), 'ISO-8859-1', 'UTF-8');
        $assistant = mb_convert_encoding($_SESSION['prenom'] . $_SESSION['nom'], 'ISO-8859-1', 'UTF-8');
        $nb_intervention = mb_convert_encoding($_SESSION['prenom'] . $_SESSION['nom'], 'ISO-8859-1', 'UTF-8');

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "cashcash";

        $intervention_id = $_GET['intervention_id'];
        $conn = new mysqli($servername, $username, $password, $dbname);


        $sql = "SELECT i.DateVisite, i.HeureVisite, t.Matricule, t.TelephoneMobile, t.Qualification,
        c.Commentaire,
        cl.RaisonSociale, cl.Siren, cl.Email,
        a.NomAgence, a.AdresseAgence, a.TelAgence
 FROM intervention i
 INNER JOIN technicien t ON i.Matricule = t.Matricule
 LEFT JOIN controler c ON i.NumeroIntervention = c.NumeroIntervention
 INNER JOIN client cl ON i.NumeroClient = cl.NumeroClient
 INNER JOIN agence a ON cl.NumeroAgence = a.NumeroAgence
 WHERE i.NumeroIntervention = $intervention_id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $this->Text(10, 150, 'Il/Elle interviendra le ' . $row['DateVisite'], 0, 1);
            $this->Text(73, 150,  mb_convert_encoding("à : ", 'ISO-8859-1', 'UTF-8') . $row['HeureVisite'], 0, 1);
            $this->Text(70, 140, ' ' . $row['TelephoneMobile'], 0, 1);
            $this->Text(75, 120, '' . $row['Qualification'], 0, 1);
            $this->Text(120, 120, mb_convert_encoding("répondant au matricule numero ", 'ISO-8859-1', 'UTF-8') . $row['Matricule'], 0, 1);
            $this->Text(10, 130, 'Ce dernier aura pour mission  ' . $row['Commentaire'], 0, 1);
            $this->Text(150, 30, '' . $row['RaisonSociale'], 0, 1);
            $this->Text(151, 35, '' . $row['Siren'], 0, 1);
            $this->Text(140, 40, '' . $row['Email'], 0, 1);
            $this->Text(10, 50, '' . $row['NomAgence'], 0, 1);
            $this->Text(10, 55, '' . $row['AdresseAgence'], 0, 1);
            $this->Text(10, 60, '' . $row['TelAgence'], 0, 1);
            $this->Ln();
        }


        $this->SetXY(45, 39);
        $this->Text(40, 40, $date_du_jour, 0, 0, 'L');
        $this->Text(10, 40, mb_convert_encoding("Télécharger le :", 'ISO-8859-1', 'UTF-8'));
        $this->Text(15, 95, mb_convert_encoding("Je soussigné(e)", 'ISO-8859-1', 'UTF-8'));
        $this->Text(47, 95, $assistant, 0, 0, 'L');
        $this->Text(10, 120, mb_convert_encoding(" Atteste de l'assignation de notre", 'ISO-8859-1', 'UTF-8'));
        $this->Text(10, 140, mb_convert_encoding("Il/Elle vous sera joingnable aux ", 'ISO-8859-1', 'UTF-8'));
        $this->Text(10, 170, mb_convert_encoding("Cordialement, L'équipe de CashCash", 'ISO-8859-1', 'UTF-8'));
        $this->Text(10, 175, mb_convert_encoding("En vous souhaitant une bonne intervention :)", 'ISO-8859-1', 'UTF-8'));


    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Poppins', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
$pdf = new PDF();
$pdf->AddFont('Poppins', '', 'Poppins-Regular.php');
$pdf->AddFont('Poppins', 'BI', 'Poppins-BoldItalic.php');
$pdf->AddFont('Poppins', 'B', 'Poppins-Bold.php');
$pdf->AddFont('Poppins', 'I', 'Poppins-Italic.php');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$pdf->output();
