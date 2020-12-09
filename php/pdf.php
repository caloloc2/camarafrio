<?php

require './vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    require 'meta.php';

    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_final = $_GET['fecha_final'];

    $consulta = Meta::Consulta("SELECT * FROM registros WHERE (fecha_hora BETWEEN '".$fecha_inicio." 00:00:00' AND '".$fecha_final." 23:59:59') ORDER BY fecha_hora DESC");

    $datos = '';

    if (is_array($consulta)){
        if (count($consulta) > 0){
            foreach ($consulta as $linea) {
                $datos .= '<tr>';
                $datos .= '<td>'.$linea['fecha_hora'].'</td>';
                $datos .= '<td>'.number_format($linea['temperatura'], 2).' C</td>';
                $datos .= '</tr>';
            }
        }
    }

    ob_start();  

    $content = '<br>';
    $content .= '<br>';
    $content .= '<br>';
    $content .= '<table style="width: 600px" align="center" border="1" cellspacing="0">';
    $content .= '<tr>';
    $content .= '<td style="width: 50%">Fecha y Hora</td>';
    $content .= '<td style="width: 50%">Temperatura</td>';
    $content .= '</tr>';
    $content .= $datos;
    $content .= '</table>';
    
    $content .= '<br>';

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example00.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}