<?php
require_once 'vendor/autoload.php';

// referenciando o namespace do dompdf

use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf();

//lendo o arquivo HTML correspondente

$html = "";

//inserindo o HTML que queremos converter

ob_start();
include "exemplo.php";

// Definindo o papel e a orientação
$html .= ob_get_contents();
ob_get_clean();
// Renderizando o HTML como PDF
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream();
?>