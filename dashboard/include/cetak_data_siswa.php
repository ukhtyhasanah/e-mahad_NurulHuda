<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_siswa.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(20);
$pdf->SetFont('TIMES','B',16);
$pdf->Cell(170,10,'Data Siswa',0,0,'C');
$pdf->Ln(1);
$pdf->SetFont('TIMES','B',12);
$pdf->Ln(10);
$pdf->SetFont('TIMES','',10);
$pdf->Cell(20,10,'Nis',1,0,'C');
$pdf->Cell(40,10,'Nama',1,0,'C');
$pdf->Cell(20,10,'Kelas',1,0,'C');
$pdf->Cell(20,10,'Gender',1,0,'C');
$pdf->Cell(40,10,'Tempat Lahir',1,0,'C');
$pdf->Cell(40,10,'Tanggal Lahir',1,1,'C');

$query  =   "SELECT * FROM siswa a, akun b, detail_pendaftaran c WHERE a.id_detail_pendaftaran = c.id_user AND b.id_user = a.id_detail_pendaftaran";
$exec   =   mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(20,40,20,20,40,40));

while ($rows = mysqli_fetch_array($exec)) {
  $pdf->Row(array(++$no,$rows['nama'],$rows['kelas'],$rows['jenis_kelamin'],$rows['tempat_lahir'],$rows['tanggal_lahir']));
}


$pdf->Output();

?>