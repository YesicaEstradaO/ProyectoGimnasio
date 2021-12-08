$(document).ready(function(){

    $("#tablaProteina").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons:[],
        "ajax":
        {
            url: '../../controladores/controladorProteina.php?op=consultar',
            type: "post",
            dataType: "json",
            data:{},
            error: (e) => { console.log(e.responseText); }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 15,
        "autoWidth": true,
        "language":
        {
            "sProcessing":          "Procesando...",
            "sLengthMenu":          "Mostrar MENU registros",
            "sZeroRecords":         "No se encontraron resultados",
            "sEmptyTable":          "Ningun dato disponible en esta tabla",
            "sInfo":                "Mostrando un total de TOTAL registros",
            "sInfoEmpty":           "Mostrando un total de 0 registros",
            "sInfoFiltered":        "(Filtrado de un total de MAX registros)",
            "sInfoPostFix":         "",
            "sSearch":              "Buscar:",
            "sUrl":                 "",
            "sInfoThousand":        ",",
            "sLoadingRecords":      "Cargando...",
            "oPaginate":
            {
                "sFirst":           "Primero",
                "sLast":            "Ultimo",
                "sNext":            "Siguiente",
                "sPrevious":        "Anterior"
            },
            "oAria":
            {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
});


function actualizarProteina(idProteina){

    location.href= `actualizarProteina.php?idProteina=${idProteina}`;
}

function eliminarProteina(idProteina){

    location.href= `../../controladores/controladorProteina.php?docPDelete=${idProteina}`;
}