$(document).ready(function(){


    $("#tablaDieta").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons:[],
        "ajax":
        {
            url: '../../controladores/controladorDieta.php?op=consultar',
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
            "sLengthMenu":          "Mostrar _MENU_ registros",
            "sZeroRecords":         "No se encontraron resultados",
            "sEmptyTable":          "Ningun dato disponible en esta tabla",
            "sInfo":                "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":           "Mostrando un total de 0 registros",
            "sInfoFiltered":        "(Filtrado de un total de _MAX_ registros)",
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

function actualizarDieta(idDieta){

    location.href= `actualizarDieta.php?idDietaUpDate=${idDieta}`;
}

function eliminarDieta(idDieta){

    location.href= `../../controladores/controladorDieta.php?idDietaDelete=${idDieta}`;
}