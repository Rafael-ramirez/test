<?php

namespace App\Http\Controllers;

use App\ProductoBase;
use Illuminate\Http\Request;

class Ctrl_productoBase extends Controller
{
    public function index()
    {
        $producto = ProductoBase::where('status', '=', 0)->orderBy("id_producto_base","desc")->get();

        return view('producto', [
            'producto' => $producto
        ]);
    }

    public function store(Request $request)
    {
        $DatosProducto = new ProductoBase;
        $DatosProducto->codigo = $request->codigo;
        $DatosProducto->nombre = $request->nombre;
        $DatosProducto->descripcion = $request->descripcion;
        $DatosProducto->precio = $request->precio;
        $DatosProducto->publicado = $request->publicado;
        $DatosProducto->anuncioActivo = $request->anuncioActivo;
        $DatosProducto->status = 0;

        $data['resultado'] = 0;
        $data['info'] = $DatosProducto;

        echo json_encode($data);
    }

    public function datos(){

        $model = ProductoBase::where("status",0);

        function Opciones($id){
            $opciones = '
                <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float BtnOpc" onclick="VentanaVer('.$id.');"><i class="material-icons">visibility</i></button>
                <button type="button" class="btn bg-primary btn-circle waves-effect waves-circle waves-float BtnOpc" onclick="VentanaEditar('.$id.');"><i class="material-icons">edit</i></button>
            ';
            return $opciones;
        }

        return datatables()->eloquent($model)
            ->addColumn('action', function ($imprimir) {
                return Opciones($imprimir->id_producto_base);
            })
            ->toJson();
    }

    public function show($id_producto_base)
    {
        $consulta = ProductoBase::find($id_producto_base);

        $resultado['info'] = $consulta;

        echo json_encode($resultado);

    }

    public function update(Request $request)
    {
        $Editar_Producto = ProductoBase::find($request->id_producto_base);

        $Editar_Producto->codigo = $request->codigo;
        $Editar_Producto->nombre = $request->nombre;
        $Editar_Producto->descripcion = $request->descripcion;
        $Editar_Producto->precio = $request->precio;
        $Editar_Producto->publicado = $request->publicado;
        $Editar_Producto->anuncioActivo = $request->anuncioActivo;
        $Editar_Producto->status = 0;

        if($Editar_Producto->save()):
            $error = 0;
        else:
            $error = 1;
        endif;

        $data['resultado'] = $error;
        $data['info'] = $Editar_Producto;

        echo json_encode($data);

    }

    public function destroy($id_producto_base)
    {
        $Consulta = ProductoBase::where("id_producto_base","=",$id_producto_base)->first();

        $Consulta->status=1;

        if($Consulta->save()): //poner despues de cambiar status
            $status = 0;
        else:
            $status = 1;
        endif;

        $data['resultado'] = $status;

        echo json_encode($data);
    }

}
