<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\productos;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Productos_Controller extends Controller
{
    public function index($id_producto)
    {
        $producto = productos::find($id_producto);
        return view('show.productos', ['producto' => $producto]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
            'Precio' => 'required|numeric',
            'Categoria' => 'required|string',
        ]);

        $producto = new productos($request->all());
        $producto->save();

        return redirect("/administrador/producto/registro")->with('success', 'Producto registrado correctamente');
    }

    public function destroy($id_producto)
    {
        $producto = productos::find($id_producto);

        if ($producto) {
            $producto->delete();
            return redirect('/administrador/producto/registro')->with('success', 'producto eliminado correctamente');
        } else {
            return redirect('/administrador/producto/registro')->with('error', 'producto no encontrado');
        }
    }

    public function show($id_producto)
    {
        $productos = productos::find($id_producto);
        return view('Electromecanica/RYR_ADMIN/admin_update_product', ['productos' => $productos]);
    }

    public function update(Request $request, $id_producto) {
        // Validar el request
        $validatedData = $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required',
            'Categoria' => 'required',

        ]);



        $productos = productos::find($id_producto);
        if ($productos) {
            $productos->Nombre = $validatedData['Nombre'];
            $productos->Descripcion = $validatedData['Descripcion'];
            $productos->Precio = $validatedData['Precio'];
            $productos->Categoria = $validatedData['Categoria'];

            $productos->save();

            return view('Electromecanica/RYR_ADMIN.admin_update_product', ['productos' => $productos]);
        } else {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    }


}


