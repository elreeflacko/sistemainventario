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
	<h1 style="text-align:center">MEMO</h1>
</div>
<div>
	<h3>FECHA: Marzo 15 de 2021</h3>
	<h3>PARA: $respuesta_memo[persona_nombre]</h3>
	<h3>DE: Alexandra Gomez Salazar</h3>
	<h3>ASUNTO: Entrega de Elementos de Tecnología</h3>
	</br>
	</br>
	<p>A continuación, detallamos el dispositivo que se le ha asignado para uso permanente de sus labores:</p>
</div>
<div>
	<table>
		<tr>
			<th>DETALLE</th>
			<th>MODELO</th>
			<th>SERIAL</th>
			<th>ACTIVO</th>
		</tr>
		<tr>
			<td>PORTATIL DELL</td>
			<td>LATITUDE E-5410</td>
			<td>GC9HN73</td>
			<td>04276</td>
		</tr>
	</table>
</div>
<div>
	<h3>Atentamente</h3>
	</br>
	</br>
	<img>
	<h4>_____________________________________</h4>
	<h4>Alexandra Gomez Salazar</h4>
	<h4>Coordinadora Dpto. de Tecnología</h4>
	</br></br></br></br></br>
	<h4>_____________________________________</h4>
	<h4>Recibido</h4>
</div>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('memo.pdf', 'I');

}

}
if (isset($_GET["dispoId"])) {
$dispo_memo = new imprimirMemo();
$dispo_memo -> dispo_id = $_GET["dispoId"];
$dispo_memo -> impresionMemo();
}else{
	echo "hay un error";
}
/*else{
$ruta_memo = ControladorPlantilla::ctrRuta();
echo '<script>
window.location="'.$.'"
</script>';
}*/




	
	

	