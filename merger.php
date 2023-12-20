<?php

require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');

use setasign\Fpdi\Fpdi;

function mergePDF($file1, $file2, $outputFile) {
    $pdf = new Fpdi();
    
    // Add the first PDF file
    $pageCount = $pdf->setSourceFile($file1);
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $template = $pdf->importPage($pageNo);
        $pdf->AddPage();
        $pdf->useTemplate($template);
    }
    
    // Add the second PDF file
    $pageCount = $pdf->setSourceFile($file2);
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $template = $pdf->importPage($pageNo);
        $pdf->AddPage();
        $pdf->useTemplate($template);
    }
    
    // Output merged PDF to a file
    $pdf->Output($outputFile, 'F');
    
    echo "Merging complete. The merged PDF is saved as: $outputFile";
}

// Usage example
$file1 = 'merged.pdf';
$file2 = 'file\1st.pdf';
$outputFile = 'merged.pdf';

mergePDF($file1, $file2, $outputFile);
?>
