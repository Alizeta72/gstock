<?php
        require '../vendor/autoload.php';

        // reference the Dompdf namespace
        use Dompdf\Dompdf;

        ob_start();

       require "../VIEW/view_vente_print.php ";


       $html = ob_get_contents();

        ob_get_clean();


        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

       
        // Output the generated PDF to Browser
        $fichier = "facture_vente.pdf";
        $dompdf->stream($fichier);


        header('Location: ../VIEW/view_vente.php');
        



?>