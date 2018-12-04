<?php

// memanggil library FPDF (../ maksudnya untuk keluar dari 1 folder, lalu memanggil folder lain)
require ('fpdf/fpdf.php');
//instance object dan memberikan pengaturan halaman PDF
$pdf = new fpdf();

//membuat halaman batu
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->setFont('Arial','B',16);
//mencetak string
$pdf->cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
//$pdf->setFont('Arial','B',12);
$pdf->cell(190,7,'DAFTAR PRODI',0,1,'C');

//Memberikan space kebawah agar tidak terlalu rapat
$pdf->cell(10,7,'',0,1);

$pdf->setFont('Arial','B',10);
$pdf->cell(10,6,'NO',1,0,'C');
$pdf->cell(65,6,'NAMA_PRODI',1,0,'C');
$pdf->cell(30,6,'JENJANG',1,0,'C');
$pdf->cell(27,6,'ID PRODI',1,0,'C');
$pdf->cell(27,6,'ID JURUSAN',1,1,'C');

$pdf->setFont('Arial','',10);

mysql_connect('localhost','root','');
mysql_select_db('akademik');

$prodi = mysql_query("SELECT * FROM prodi");
$no=1;
while ($row =  mysql_fetch_array($prodi)){
	$pdf->cell(10,6,$no,1,0);
	$pdf->cell(65,6,$row['nama_prodi'],1,0);
	$pdf->cell(30,6,$row['jenjang'],1,0);
	$pdf->cell(27,6,$row['id_prodi'],1,0);
	$pdf->cell(27,6,$row['id_jurusan'],1,1);
	$no++;
}
$pdf->Output();
?>