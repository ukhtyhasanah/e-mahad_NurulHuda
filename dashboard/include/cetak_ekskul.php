<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_guru.php';

$id_maintenance = $_GET['id_mnt'];
$id = $_GET['id'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(20);
$pdf->SetFont('TIMES','B',16);
$pdf->Cell(170,10,'Rapor Siswa',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('TIMES','',12);

// ambil data siswa
$queryNama = "SELECT * FROM siswa WHERE nis=$id";
$execNama   =   mysqli_query($conn, $queryNama);
$data = mysqli_fetch_array($execNama);
// var_dump($data['nama']);

$pdf->Cell(30,10,'Nama : '.str_repeat($data["nama"],1),0,0,'L');
$pdf->Ln(7);
$pdf->Cell(30,10,"NIS  ".str_repeat(' ', 2).": ".str_repeat($data["nis"],1),0,0,'L');
$pdf->Ln(1);
$pdf->SetFont('TIMES','B',12);
$pdf->Ln(10);
$pdf->SetLeftMargin(35);
$pdf->SetFont('TIMES','',10);
$pdf->Cell(40,10,'Nama Ekstrakulikuler',1,0,'C');
$pdf->Cell(30,10,'Nilai',1,0,'C');
$pdf->Cell(30,10,'Predikat',1,0,'C');
$pdf->Cell(35,10,'Deskripsi',1,1,'C');

$query  =   "SELECT mapel.nama_mapel_kegiatan, nilai.kkm, nilai.nilai, nilai.predikat, nilai.deskripsi FROM mapel INNER JOIN nilai ON mapel.kode_mapel_kegiatan=nilai.id_mapel";
$exec   =   mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(40,30,30,35));

while ($rows = mysqli_fetch_array($exec)) {
  $pdf->Row(array($rows['nama_mapel_kegiatan'],$rows['nilai'],$rows['predikat'],$rows['deskripsi']),array('C','C','C','C','C'));
}


$pdf->Output();

?>