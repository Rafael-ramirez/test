// var table;

$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    // table = $('.js-exportable').DataTable({
    //     language: {
    //         "decimal": "",
    //         "emptyTable": "No hay información",
    //         "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    //         "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    //         "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    //         "infoPostFix": "",
    //         "thousands": ",",
    //         "lengthMenu": "Mostrar _MENU_ Entradas",
    //         "loadingRecords": "Cargando...",
    //         "processing": "Procesando...",
    //         "search": "Buscar:",
    //         "zeroRecords": "Sin resultados encontrados",
    //         "paginate": {
    //             "first": "Primero",
    //             "last": "Ultimo",
    //             "next": "Siguiente",
    //             "previous": "Anterior"
    //         }
    //     },
    //     order: [[ 0, "desc" ]],
    //     dom: 'Bfrtip',
    //     responsive: true,
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
});