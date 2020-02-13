@extends('admin.admin_plantilla')

@section('titulo')
    Entradas de inventario
@endsection
@section('estilos')
    <script>
        var table;

        $(function() {
            //Exportable table
            table = $('#example1').DataTable({
                // processing: true,
                serverSide: true,
                decimal: ",",
                thousands: ".",
                ajax: '{{ url('producto/datos') }}',
                columns: [
                    { data: 'id_producto_base', name: 'id_producto_base' },
                    { data: 'codigo', name: 'codigo'},
                    { data: 'nombre', name: 'nombre'},
                    { data: 'action', name: 'action' }
                ],
                order: [[ 0, "desc" ]],
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'print'
                ]
            });
        });
    </script>
    <script>
    </script>
    <script src="{{ asset('js/js/productos.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
    <script src="{{ asset('css/admin/js/pages/ui/tooltips-popovers.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <!-- Modal Agregar -->
            <div class="modal fade" id="modal_agregar" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title text-center" id="defaultModalLabel">Nueva Entrada</h4>
                            <hr>
                        </div>
                        <form id="form_productos" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="inputName">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="inputName">Descripción</label>
                                            <input type="text" name="descripcion" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Codigo</label>
                                            <input type="text" name="codigo" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Precio</label>
                                            <input type="text" name="precio" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Cantidad</label>
                                            <input type="text" name="cantidad" class="form-control" required/>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col">--}}
                                    {{--                                        <p>Proveedor</p>--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="inputName">Nombre</label>--}}
                                    {{--                                                <input type="text" name="nombre_pro" class="form-control"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="inputName">E-mail</label>--}}
                                    {{--                                                <input type="email" name="email" class="form-control"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="inputName">Teléfono </label>--}}
                                    {{--                                                <input type="number" name="telefono" class="form-control"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success waves-effect" id="BotonGuardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Editar Entradas -->
            <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="defaultModalLabel">Actualizar Entradas</h4>
                            <hr>
                        </div>
                        <form id="form_editar">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <p>Producto</p>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="inputName">Nombre</label>
                                                <input type="text" name="nombre" id="editar_nombre_prod" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="inputName">Descripción</label>
                                                <input type="text" name="descripcion" id="editar_descripcion" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Codigo</label>
                                                <input type="text" name="codigo" id="editar_codigo" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Precio</label>
                                                <input type="text" name="precio" id="editar_precio" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Cantidad</label>
                                                <input type="text" name="cantidad" id="editar_cantidad" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    {{--                                    <div class="col">--}}
                                    {{--                                        <p>Proveedor</p>--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="inputName">Nombre</label>--}}
                                    {{--                                                <input type="text" name="nombre_pro" id="editar_nombre_pro" class="form-control"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="inputName">E-mail</label>--}}
                                    {{--                                                <input type="email" name="email" id="editar_email" class="form-control"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="inputName">Teléfono </label>--}}
                                    {{--                                                <input type="number" name="telefono" id="editar_telefono" class="form-control"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <input type="hidden" name="id_producto_base" class="form-control" id="id_producto_base"/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success waves-effect" id="BotonEditar">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Productos
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <button type="button" class="btn bg-indigo waves-effect BtnAgregar" data-toggle="modal" data-target="#modal_agregar">Agregar</button>
                                {{--                                <button type="button" class="btn bg-indigo waves-effect BtnAgregar" data-toggle="modal" data-target="#modal_ajuste">Ajuste</button>--}}
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Operaciones</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
@endsection
