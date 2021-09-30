<?php
        include "../../library/PDF/fpdf/fpdf.php";
        include "../../config/database.php"; 
        $db = new database();

        $id_rm=$_GET['z'];

        $sql = "SELECT *, (SELECT gigi.jenis_gigi FROM tbl_jenis_gigi gigi WHERE gigi.id_jenis_gigi = rm.id_jenis_gigi) jenis_gigi FROM tbl_pasien ps, tbl_rekam_medik rm WHERE ps.id_pasien = rm.id_pasien AND rm.id_rm = '$id_rm'"; 
        $query = $db->query($sql);
        $r = $db->fetch_assoc($query);


    	$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        
        // $pdf->SetX(50/2);
        $pdf->SetFont('Arial','B',10);
        // $coba = $pdf->Cell(10,4,'No.',1,1,'C');
        // $pdf->Cell(190,55,'',0,1,'C');
        
        // $pdf->SetY($pdf->GetY() - 52);
        // $pdf->SetX($pdf->GetX() - 30);
        $pdf->Cell(190,5,'LAPORAN',0,1,'C');
        $pdf->Cell(190,5,'HASIL DIAGNOSA KARIES GIGI',0,1,'C');
        $pdf->SetY($pdf->GetY() + 2);
        $pdf->SetX($pdf->GetX() + 20);
        $pdf->Cell(150,1,'','T','T','T','T');

        $pdf->SetY($pdf->GetY() + 7);
        $pdf->SetX($pdf->GetX() + 43);
        $pdf->Cell(105,57,'',1,1,'C'); //Make box

        $pdf->SetFont('Arial','B',9);
        $pdf->SetY($pdf->GetY() - 55);
        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Nama Pasien",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[nama_pasien]",0,1,'L');

        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Jenis Kelamin",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[jk_pasien]",0,1,'L');

        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Alamat",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->MultiCell(39,5,"$r[alamat_pasien]",0,'L'); //Wrap Text

        $pdf->SetY($pdf->GetY() + 2);
        $pdf->SetX($pdf->GetX() + 43);
        $pdf->Cell(105,1,'','T'); //Make Line Divider

        $pdf->SetY($pdf->GetY() + 2);
        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Jenis Gigi",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[jenis_gigi]",0,1,'L');

        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Gejala Gigi",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[gigi]",0,1,'L');

        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Gejala Gusi",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[gusi]",0,1,'L');

        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Rasa Nyeri",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[nyeri]",0,1,'L');

        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Rasa Ngilu",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[ngilu]",0,1,'L');

        $pdf->SetY($pdf->GetY() + 2);
        $pdf->SetX($pdf->GetX() + 43);
        $pdf->Cell(105,1,'','T'); //Make Line Divider

        $pdf->SetY($pdf->GetY() + 2);
        $pdf->SetX($pdf->GetX() + 65);
        $pdf->Cell(22,5,"Hasil Diagnosa",0,0,'L');
        $pdf->Cell(5,5,":",0,0,'C');
        $pdf->Cell(30,5,"$r[diagnosa]",0,1,'L');
        
        $pdf->Output('D','Hasil_Diagnosa.pdf');

?>