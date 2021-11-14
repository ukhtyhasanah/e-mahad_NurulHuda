<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_pendapatan.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(10);
$pdf->SetFont('TIMES','B',16);
$pdf->Cell(190,10,'Data Pendapatan',0,0,'C');
$pdf->Ln(1);
$pdf->SetFont('TIMES','B',12);
$pdf->Ln(10);
$pdf->SetFont('TIMES','',10);
$pdf->Cell(10,10,'No.',1,0,'C');
$pdf->Cell(40,10,'Nama',1,0,'C');
$pdf->Cell(50,10,'Email',1,0,'C');
$pdf->Cell(40,10,'Tanggal Pembayaran',1,0,'C');
$pdf->Cell(20,10,'Cicilan Ke-',1,0,'C');
$pdf->Cell(30,10,'Earn',1,1,'C');

$query	=	"SELECT a.nama,b.email, d.nominal as nom, d.tanggal_pembayaran, d.cicilan_ke, c.metode_pembayaran_pendaftaran as metode_pembayaran
			FROM pendaftaran a, akun b, detail_pendaftaran c, cicilan_pendaftaran d 
			WHERE a.Id = c.id_user 
			AND b.id_user = a.Id
			AND c.Id = d.id_detail_pendaftaran";
$exec 	=	mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(10,40,50,40,20,30));

$count 	=	0;
$tmp_id = "";
$count = 0;

while ($rows = mysqli_fetch_array($exec)) {

  $mp 	=	$rows['metode_pembayaran'];
 
  if ($mp == "C") {
  	$cicilan = $rows['cicilan_ke'];
    if ($cicilan == 2) {
      $cicilan = "LUNAS";
    }
  }else{
  	$cicilan = "LUNAS";
  }

  $pdf->Row(array(++$no,$rows['nama'],$rows['email'],$rows['tanggal_pembayaran'],$cicilan,'Rp. '.thousandSparator($rows['nom'])));
  $count+=$rows['nom'];
}

$pdf->Ln(0);
$pdf->Cell(160,10,'Total',1,0,'C');
$pdf->Cell(30,10,'Rp. '.thousandSparator($count),1,1,'L');


$pdf->Output();



function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}


?>