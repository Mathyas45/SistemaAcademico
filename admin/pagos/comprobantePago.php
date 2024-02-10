<?php
$id_estudiante = $_GET['id_estudiante'];
$id_pago = $_GET['id'];

// Include the main TCPDF library (search for installation path).
include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');
include('../../app/controladores/configuraciones/institucion/institucionListadoControlador.php');
include('../../app/controladores/estudiantes/estudiantesShowControlador.php');
include('../../app/controladores/pagos/pagosShowForComprobanteControlador.php');


//trayendo datos de la institución
foreach ($instituciones as $institucione) {
    $nombre_institucion = $institucione['nombre_Institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $correo = $institucione['email'];
    $logo = $institucione['logo'];
}
//trayendo datos del pago del estudiante
foreach ($pagos2 as $pago) {
    $mes_pagado = $pago['mes_pagado'];
    $monto_pagado = $pago['monto_pagado'];
    $fecha_pagado = $pago['fecha_pago'];
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(216, 280), true, 'UTF-8', false);
// var_dump(APP_NAME);
// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(APP_NAME);
$pdf->setTitle(APP_NAME);
$pdf->setSubject(APP_NAME);
$pdf->setKeywords(APP_NAME);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(10, 20, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('Times', '', 11);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect, le da un efecto borroso
// $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

//stylos par el QR
$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
$QR = 'Este Recibo es verificado por el sistema de Pagos de la Institución Educativa ' . $nombre_institucion . ', 
por el pago del mes de ' . $mes_pagado . ' del estudiante ' . $apellido_estudiante . ' ' . $nombre_estudiante . ' con DNI ' . $dni_estudiante . ' por un monto de S/. ' . $monto_pagado . ' el día ' . $fecha_pagado . ' ' . $nombre_institucion . ' Gracias por su pago.';
$pdf->write2DBarcode($QR, 'QRCODE,L',  165, 45, 30, 30, $style);

$QR2 = 'Esta Copia de Recibo es verificado por el sistema de Pagos de la Institución Educativa ' . $nombre_institucion . ', 
por el pago del mes de ' . $mes_pagado . ' del estudiante ' . $apellido_estudiante . ' ' . $nombre_estudiante . ' con DNI ' . $dni_estudiante . ' por un monto de S/. ' . $monto_pagado . ' el día ' . $fecha_pagado . ' ' . $nombre_institucion . ' Gracias por su pago.';
$pdf->write2DBarcode($QR2, 'QRCODE,L',  165, 165, 30, 30, $style);


// Set some content to print
$html = '
<table border="0">

<tr>
<td width="200px" style="text-align:center"><img src="../../public/images/configuracion/' . $logo . '" alt="" width="120px"></td>
<td width="350px"></td>
<td>
<p width="50px"><b>Nro: </b>' . $id_pago . '<br>
<b>Fecha: </b>' . $fecha_pagado . '<br><br>
<b>ORIGINAL </b><br>
</p>
</td>
</tr>
<tr>

<td style="text-align:center"><b>' . $nombre_institucion . '</b><br>
<small>' . $direccion . '</small><br>
<small>' . $celular . '</small><br>
</td>
<td style="text-align: center; margin-top: 0;">
    <h2><b><u>RECIBO DE CAJA </u></b></h2>
</td>
</tr>
</table>
<br>
<table border="0">
<tr>
<td width="170px"><b>Estudiante: </b></td>
<td >'.$apellido_estudiante.' '.$nombre_estudiante.'</td>
</tr>
<tr>
<td width="170px"><b>Dni Estudiante: </b></td>
<td>'.$dni_estudiante.'</td>
</tr>
<tr>
<td width="170px"><b>Nivel: </b></td>
<td>'.$nivel_estudiante.'</td>
</tr>
<tr>
<td width="170px"><b>Grado: </b></td>
<td>'.$grado_estudiante.' | Seccion: '. $seccion_estudiante.'</td>
</tr>

<tr>
<td width="170px"><b>Mes cancelado: </b></td>
<td>'.$mes_pagado.'</td>
</tr>
<tr>
<td width="170px"><b>Monto cancelado: </b></td>
<td>'.'S/. '.$monto_pagado.'</td>
</tr>
</table>

<br><br><br><br>
<table border="0">
<tr>
    <td style="text-align: center">
     _______________________________________ <br>
     <b>La Institución Educativa</b> <br>
Lic. Mathyas Coronado Martinez
    </td>
    <td style="text-align: center">
    ________________________________________ <br>
    <b>Padres/Tutores</b> <br>
    Recibí Conforme <br>
    ' . $nombres_padre . '
    </td>
</tr>
</table>



<p>-----------------------------------------------------------------------------------------------------------------------------------------------------</p>
<table border="0">

<tr>
<td width="200px" style="text-align:center"><img src="../../public/images/configuracion/' . $logo . '" alt="" width="120px"></td>
<td width="350px"></td>
<td>
<p width="50px"><b>Nro: </b>' . $id_pago . '<br>
<b>Fecha: </b>' . $fecha_pagado . '<br><br>
<b>COPIA </b><br>
</p>
</td>
</tr>
<tr>

<td style="text-align:center"><b>' . $nombre_institucion . '</b><br>
<small>' . $direccion . '</small><br>
<small>' . $celular . '</small><br>
</td>
<td style="text-align: center; margin-top: 0;">
    <h2><b><u>RECIBO DE CAJA </u></b></h2>
</td>
</tr>
</table>
<br>

<table border="0">
<tr>
<td width="170px"><b>Estudiante: </b></td>
<td >'.$apellido_estudiante.' '.$nombre_estudiante.'</td>
</tr>
<tr>
<td width="170px"><b>Dni Estudiante: </b></td>
<td>'.$dni_estudiante.'</td>
</tr>
<tr>
<td width="170px"><b>Nivel: </b></td>
<td>'.$nivel_estudiante.'</td>
</tr>
<tr>
<td width="170px"><b>Grado: </b></td>
<td>'.$grado_estudiante.' | Seccion: '. $seccion_estudiante.'</td>
</tr>

<tr>
<td width="170px"><b>Mes cancelado: </b></td>
<td>'.$mes_pagado.'</td>
</tr>
<tr>
<td width="170px"><b>Monto cancelado: </b></td>
<td>'.'S/. '.$monto_pagado.'</td>
</tr>
</table>

<br><br><br><br>
<table border="0">
<tr>
    <td style="text-align: center">
     _______________________________________ <br>
     <b>La Institución Educativa</b> <br>
Lic. Mathyas Coronado Martinez
    </td>
    <td style="text-align: center">
    ________________________________________ <br>
    <b>Padres/Tutores</b> <br>
    Recibí Conforme <br>
    ' . $nombres_padre . '
    </td>
</tr>
</table>

<br><br>

</p>
';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Comprobante.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
