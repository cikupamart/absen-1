<?php

	require('fpdflib/fpdf.php');
	include('koneksi.php');
	$thn1 = $_GET['thn1'];
	$bln1 = $_GET['bln1'];
	$tgl1 = $_GET['tgl1'];
	$thn2 = $_GET['thn2'];
	$bln2 = $_GET['bln2'];
	$tgl2 = $_GET['tgl2'];
	$ket['s']="sakit";
	$ket['i']="izin";
	$ket['m']="masuk";
	
	class PDF extends FPDF{
		// bikin fungsi wat header
		function header(){
			$this->Image('image/logo.png', 10, 4, 23,20);
			$this->SetFont('Arial','B',17);
			$this->Cell(0,0,'LAPORAN ABSEN HARIAN',0,1,'C');
			$this->Cell(0,15,'PT UNINDRA SOFT',0,1,'C');
			$this->SetLineWidth(0.1);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY()+1,200,$this->GetY()+1);
			$this->SetLineWidth(0.1);
			$this->Line(10,$this->GetY()+2,200,$this->GetY()+2);
			$this->SetY(30);
		}
		
		// bikin fungsi wat footer
		function footer(){
			$this->SetFont('Arial','',8);
			$this->SetY(-10);
			$this->Line(10,$this->GetY(),290,$this->GetY());
			$this->Cell(0,7,'Halaman '.$this->PageNo().' dari {nb}',0,1,'R');
			$this->Cell(20,0,'Berkas ini dicetak pada tanggal : '.Date('j F y, g:i a'),0,1,'');
		}
	
	
	
	}
	
	
	$pdf = new PDF('P','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont('Arial','B',9);
	$pdf->setY(30);
	$pdf->setX(10);
	$pdf->Cell(100,7,"MULAI TANGGAL ".$tgl1."-".$bln1."-".$thn1." SAMPAI DENGAN ".$tgl2."-".$bln2."-".$thn2,0,0,'L');
	$pdf->SetY(37);
	$pdf->SetX(10);
	$pdf->SetLineWidth(0.3);
	$pdf->Cell(10,7,'NO',1,0,'C');
	$pdf->Cell(30,7,'NIP',1,0,'C');
	$pdf->Cell(45,7,'NAMA',1,0,'C');
	$pdf->Cell(35,7,'BAGIAN',1,0,'C');
	$pdf->Cell(25,7,'MASUK',1,0,'C');
	$pdf->Cell(25,7,'PULANG',1,0,'C');
	$pdf->Cell(20,7,'KET',1,0,'C');

	

	
	$pdf->SetFont('Arial','',9);
	$pdf->SetY(45);
	$pdf->SetX(20);

	$ambildb = "select tbl_absen.id, tbl_pegawai.nama, tbl_pegawai.bagian, tbl_absen.jam_dat, tbl_absen.jam_pul,tbl_absen.ket from tbl_absen,tbl_pegawai where tbl_absen.id = tbl_pegawai.id and tbl_absen.tgl between '".$thn1."-".$bln1."-".$tgl1."' and '".$thn2."-".$bln2."-".$tgl2."';";
	$qr_ambildb = mysql_query($ambildb);
	for ($i=1; $hasil = mysql_fetch_array($qr_ambildb); $i++){
		$pdf->SetX(10);
		$pdf->Cell(10,7,$i,1,0,'C');
		$pdf->Cell(30,7,$hasil['id'],1,0,'C');
		$pdf->Cell(45,7,$hasil['nama'],1,0,'L');
		$pdf->Cell(35,7,$hasil['bagian'],1,0,'C');
		$pdf->Cell(25,7,$hasil['jam_dat'],1,0,'C');
		$pdf->Cell(25,7,$hasil['jam_pul'],1,0,'C');
		$pdf->Cell(20,7,$ket[$hasil['ket']],1,0,'C');
		$pdf->Ln();
	}
	
	$pdf->Output('LAPORAN HARIAN.pdf','I');
	

?>