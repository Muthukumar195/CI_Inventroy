<?php
require_once APPPATH.'third_party/mpdf/mpdf.php';
	$html='Pdf exportr run';

	// Create new PDF with font subsetting, 234mm wide, 297mm high
	$mpdf = new mPDF('s', array(234,280));

	// Make it DOUBLE SIDED document with 4mm bleed
	$mpdf->mirrorMargins = 1;
	$mpdf->bleedMargin = 4;
	$mpdf->WriteHTML($html, 2);

	$mpdf->SetTitle("Invoice");
	$mpdf->SetAuthor("Daffodills India");
	$mpdf->SetCreator("Daffodills India");
	$mpdf->SetSubject("Invoice");
	$mpdf->SetKeywords("INVOICE");

	$path = $mpdf->Output();
	echo $path;
?>
