/*======================================================
=  CARGAR  LA TABLA DINAMICA PARA BUSCAR PERSONAS =
========================================================*/
$(document).ready(function() {
    $('#tabla_buscar_persona').DataTable({
        "ajax": "ajax/datatable-personas.ajax.php",
        "deferRender": true,
        "retrieveRender": true,
        "processing": true,
        "lengthMenu": [[1,-1], [1,"All"]],
        "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
    });
});
/*=====  End of CARGAR  LA TABLA DINAMICA PARA BUSCAR PERSONAS ==========*/