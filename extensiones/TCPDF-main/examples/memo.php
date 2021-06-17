<?php

require_once "../../../controladores/dispositivos.controlador.php";
require_once "../../../modelos/dispositivos.modelo.php";
require_once "../../../controladores/plantilla.controlador.php"; 

class imprimirMemo{

public $dispo_id;	

public function impresionMemo(){

$ruta_memo = ControladorPlantilla::ctrRuta();

$item = "dispositivo_id";
$valor = $this->dispo_id;

$respuesta_memo = ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);

$pdf->setFont('helvetica', '', 10);

$pdf->AddPage();

$html = <<<EOD
<div>
	<img src="../../../vistas/img/plantilla/logo_normal.PNG" width="200" style="text-align:center">
</div>
<div>
	<h2 style="text-align:center">MEMO</h2>
</div>
<div>
	<h4>$respuesta_memo[dispositivo_estado_fecha]</h4>
	<h4>PARA: $respuesta_memo[persona_nombre]</h4>
	<h4>DE: Alexandra Gomez Salazar</h3>
	<h4>ASUNTO: Entrega de Elementos de Tecnología</h4>
	</br>
	</br>
	<p>A continuación, detallamos el dispositivo que se le ha asignado para uso permanente de sus labores:</p>
</div>
<div>
	<table style="border: 1px solid black">
		<tr>
			<th style="border: 1px solid black">DETALLE</th>
			<th style="border: 1px solid black">MODELO</th>
			<th style="border: 1px solid black">SERIAL</th>
			<th style="border: 1px solid black">ACTIVO</th>
		</tr>
		<tr>
			<td style="border: 1px solid black">$respuesta_memo[tipo_dispositivo_nombre]</td>
			<td style="border: 1px solid black">$respuesta_memo[modelo_nombre]</td>
			<td style="border: 1px solid black">$respuesta_memo[dispositivo_serial]</td>
			<td style="border: 1px solid black">$respuesta_memo[dispositivo_activo]</td>
		</tr>
	</table>
</div>
<div>
	<h3>Atentamente</h3>
	</br>
	</br>
	<img>
	<p>_____________________________________</p>
	<h4>Alexandra Gomez Salazar</h4>
	<h4>Coordinadora Dpto. de Tecnología</h4>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	<p>_____________________________________</p>
	<h4>Recibido</h4>
</div>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->ImageSVG('@'.$respuesta_memo["dispositivo_firma"], $x=15, $y=185, $w=50, $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
$pdf->Output('memo.pdf', 'I');
}

}
if (isset($_GET["dispoId"])) {
$dispo_memo = new imprimirMemo();
$dispo_memo -> dispo_id = $_GET["dispoId"];
$dispo_memo -> impresionMemo();
}else{
$ruta_memo = ControladorPlantilla::ctrRuta();
echo '<script>
window.location="'.$ruta_memo.'";
</script>';	
}





	
	

	