<?php

require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
?>

<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<?Php

$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A6-L', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('mpdf/mpdf.css'); // external css
$pdf->WriteHTML($stylesheet, 1);
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     
