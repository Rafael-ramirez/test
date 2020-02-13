$( "#form_productos" ).submit(function( event ) {

    event.preventDefault();

    var formData = new FormData($("#form_productos")[0]);

    BotonCarga("#BotonGuardar",1, "#form_productos");


    $.ajax({
        url: "/producto/post",
        type: 'post',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(data){
            var result = JSON.parse(data);

            console.log(result.resultado);

            if(result.resultado===0){
                // var ID = result.info.id_sucursales;
                table.draw();

                // console.log(result);

                $('#modal_agregar').modal('hide');
                $("#form_productos")[0].reset();
            }else{
                alert('Error al guardar');

            }
            BotonCarga("#BotonGuardar",2, "#form_productos");

        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {

        BotonCarga("#BotonGuardar",2, "#form_productos");

        swal(
            'Ocurrio un error!',
            'Por favor verifica lo siguiente:<br> ' +
            '1.- Que la conexión a internet este estable<br>' +
            '2.- Que su extensión sea de las permitidas (jpeg, png, jpg, gif)',
            'warning'
        );

    });
});

$( "#form_editar" ).submit(function( event ) {

    event.preventDefault();

    var formData = new FormData($("#form_editar")[0]);

    BotonCarga("#BotonEditar",1, "#form_editar");


    $.ajax({
        url: "/producto/update",
        type: 'post',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(data){

            var result = JSON.parse(data);

            if(result.resultado===0){

                table.draw();

                $('#modal_editar').modal('hide');
                $("#form_editar")[0].reset();

            }else{
                alert('Error al guardar');
            }

            BotonCarga("#BotonEditar",2, "#form_editar");

        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {

        BotonCarga("#BotonEditar",2, "#form_editar");

        swal(
            'Ocurrio un error!',
            'Por favor verifica lo siguiente:<br> ' +
            '1.- Que la conexión a internet este estable<br>' +
            '2.- Que su extensión sea de las permitidas (jpeg, png, jpg, gif)',
            'warning'
        );
    });
});

function VentanaEditar(id_producto_base){

    $.ajax({
        type: 'get',
        url: '/producto/show/'+id_producto_base,
        data: { id: id_producto_base },
        success: function (data) {
            var result = JSON.parse(data);

            $('#editar_nombre_prod').val(result.info.nombre);
            $('#editar_descripcion').val(result.info.descripcion);
            $('#editar_precio').val(result.info.precio);
            $('#editar_codigo').val(result.info.codigo);
            $('#editar_nombre_pro').val(result.info.nombre_pro);
            $('#editar_email').val(result.info.email);
            $('#editar_telefono').val(result.info.telefono);

            $('#modal_editar').modal('show');
        }
    });

}


function VentanaBorrar(id_producto_base) {
    swal({
        title: '',
        html: 'Estas seguro de borrar?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy seguro',
        cancelButtonText: "Cancelar"
    }).then(function () {
        $.ajax({
            type: 'get',
            url: '/producto/delete/'+id_producto_base,
            data: {id: id_producto_base},
            success: function (data) {
                var result = JSON.parse(data);

                if (result.resultado === 0) {

                    table.draw();


                } else {
                    alert("Lo sentimos, algo salió mal al intentar guardar los datos, favor de volver a intentarlo");
                }
            }
        });
    });
}


