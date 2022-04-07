<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Al requerir el autoload, cargamos todo lo necesario para trabajar
require_once APPPATH . "libraries/third_party/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

class pdfgenerator
{


    public function generate2($html, $filename = '', $download)
    {
        $stream = FALSE;
        $paper = 'A4';
        $orientation = "portrait";
        //VAR_DUMP(APPPATH . "libraries/third_party/dompdf/autoload.inc.php");
        $dompdf = new DOMPDF();
        //echo $html;
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 1));


        if ($stream) {
            // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.


        } else {
            return $dompdf->output();
        }
    }

    public function generate($html)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        //echo $html;
        // (Optional) Setup the paper size and orientation
        //$dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("pdfaaaaa.pdf", array("Attachment" => 0));
        //$dompdf->download();
    }
}
