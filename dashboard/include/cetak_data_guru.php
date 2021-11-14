<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_guru.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(20);
$pdf->SetFont('TIMES','B',16);
$pdf->Cell(170,10,'Data Pengajar',0,0,'C');
$pdf->Ln(1);
$pdf->SetFont('TIMES','B',12);
$pdf->Ln(10);
$pdf->SetFont('TIMES','',10);
$pdf->Cell(20,10,'NIP',1,0,'C');
$pdf->Cell(40,10,'Nama Guru',1,0,'C');
$pdf->Cell(40,10,'Alamat',1,0,'C');
$pdf->Cell(30,10,'Telepon',1,0,'C');
$pdf->Cell(40,10,'Kode Mata Pelajaran',1,1,'C');

$query  =   "SELECT * FROM guru";
$exec   =   mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(20,40,40,30,40));

while ($rows = mysqli_fetch_array($exec)) {
  $pdf->Row(array(++$no,$rows['nama_guru'],$rows['alamat'],$rows['telp'],$rows['kode_mapel_kegiatan']));
}


$pdf->Output();

?>