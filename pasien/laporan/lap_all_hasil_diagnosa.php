<?php
        include "../../library/PDF/fpdf/fpdf.php";
        include "../../config/database.php"; 
        $db = new database();

        $id_pasien=$_GET['z'];

        $sql = "SELECT rm.*, (SELECT ps.nama_pasien FROM tbl_pasien ps WHERE ps.id_pasien = rm.id_pasien) nama_pasien, (SELECT ps.alamat_pasien FROM tbl_pasien ps WHERE ps.id_pasien = rm.id_pasien) alamat_pasien, (SELECT ps.jk_pasien FROM tbl_pasien ps WHERE ps.id_pasien = rm.id_pasien) jk_pasien, (SELECT gigi.jenis_gigi FROM tbl_jenis_gigi gigi WHERE gigi.id_jenis_gigi = rm.id_jenis_gigi) jenis_gigi FROM tbl_rekam_medik rm WHERE id_pasien = '$id_pasien' ORDER BY rm.id_rm DESC";
        $query1 = $db->query($sql);
        $query2 = $db->query($sql);
        $r = $db->fetch_assoc($query1);


    	$pdf = new FPDF('L','mm','A4'); //Landscape page
        // membuat halaman baru
        $pdf->SetTitle('Cetak Laporan Hasil Diagnosa Karies Gigi');
        $pdf->AddPage();
        
        // $pdf->SetX(50/2);
        $pdf->Image("B.jpg",20,5,20);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(275,5,'LAPORAN',0,1,'C');
        $pdf->Cell(275,5,'SEMUA HASIL DIAGNOSA KARIES GIGI',0,1,'C');
        $pdf->Cell(275,5,strtoupper($r['nama_pasien']),0,1,'C');
        $pdf->SetY($pdf->GetY() + 2);
        $pdf->SetX($pdf->GetX() + 13);
        $pdf->Cell(250,1,'','T','T','T','T');

        $pdf->SetFont('Arial','B',9);
        $pdf->SetY($pdf->GetY() + 10);
        $pdf->SetX($pdf->GetX() + 15);
        $pdf->setFillColor(230,230,230);
        $pdf->Cell(10,10,"No.",1,0,'C',1);
        $pdf->Cell(25,10,"Tgl Periksa",1,0,'C',1);
        $pdf->Cell(27,10,"Jenis Gigi",1,0,'C',1);
        $pdf->Cell(37,10,"Gigi",1,0,'C',1);
        $pdf->Cell(37,10,"Gusi",1,0,'C',1);
        $pdf->Cell(37,10,"Nyeri",1,0,'C',1);
        $pdf->Cell(37,10,"Ngilu",1,0,'C',1);
        $pdf->Cell(37,10,"Diagnosa",1,1,'C',1);

        $no = 0;
        while($row = $db->fetch_assoc($query2)){
            $no++;

            $pdf->SetX($pdf->GetX() + 15);

            $pdf->Cell(10,10,$no,1,0,'C');
            $pdf->Cell(25,10,date('d-m-Y', strtotime($row['tgl_periksa'])),1,0,'C');
            $pdf->Cell(27,10,$row['jenis_gigi'],1,0,'C');
            $pdf->Cell(37,10,$row['gigi'],1,0,'C');
            $pdf->Cell(37,10,$row['gusi'],1,0,'C');
            $pdf->Cell(37,10,$row['nyeri'],1,0,'C');
            $pdf->Cell(37,10,$row['ngilu'],1,0,'C');
            $pdf->Cell(37,10,$row['diagnosa'],1,1,'C');
        }

        
        $pdf->Output('D','Hasil_Semua_Diagnosa.pdf');

?>