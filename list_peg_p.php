<?php

	require('fpdflib/fpdf.php');
	include('koneksi.php');
	$data = $_GET['h_val'];
	
	class PDF extends FPDF{
		// bikin fungsi wat header
		function header(){
			$this->Image('image/logo.png', 10, 4, 23,20);
			$this->SetFont('Arial','B',17);
			$this->Cell(0,0,'DATA KARYAWAN',0,1,'C');
			$this->Cell(0,15,'PT CYBERVILLE GUNA INDONESIA',0,1,'C');
			$this->SetLineWidth(0.1);
			$this->Line(10,$this->GetY(),290,$this->GetY());
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY()+1,290,$this->GetY()+1);
			$this->SetLineWidth(0.1);
			$this->Line(10,$this->GetY()+2,290,$this->GetY()+2);
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
	
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont('Arial','B',8);
	$pdf->SetY(35);
	$pdf->SetX(10);
	$pdf->SetLineWidth(0.3);
	$pdf->Cell(10,7,'NO',1,0,'C');
	$pdf->Cell(25,7,'NIP',1,0,'C');
	$pdf->Cell(50,7,'NAMA',1,0,'C');
	$pdf->Cell(25,7,'LAHIR',1,0,'C');
	$pdf->Cell(25,7,'TGL LAHIR',1,0,'C');
	$pdf->Cell(25,7,'BAGIAN',1,0,'C');
	$pdf->Cell(95,7,'ALAMAT',1,0,'C');
	$pdf->Cell(25,7,'TELP',1,0,'C');
	

	
	$pdf->SetFont('Arial','',8);
	$pdf->SetY(45);
	$pdf->SetX(20);
	
	$ambildb = "select * from tbl_pegawai limit ".$data.",20;";
	$qr_ambildb = mysql_query($ambildb);
	for ($i=1; $hasil = mysql_fetch_array($qr_ambildb); $i++){
		$pdf->SetX(10);
		$pdf->Cell(10,7,($i+$data),1,0,'C');
		$pdf->Cell(25,7,$hasil['id'],1,0,'C');
		$pdf->Cell(50,7,$hasil['nama'],1,0,'L');
		$pdf->Cell(25,7,$hasil['tpt_lahir'],1,0,'C');
		$pdf->Cell(25,7,$hasil['tgl_lahir'],1,0,'C');
		$pdf->Cell(25,7,$hasil['bagian'],1,0,'L');
		$pdf->Cell(95,7,$hasil['alamat'],1,0,'L');
		$pdf->Cell(25,7,$hasil['telp'],1,0,'C');
		$pdf->Ln();
	}
	
	$pdf->Output('BIODATA PEGAWAI.pdf','I');
	

?>