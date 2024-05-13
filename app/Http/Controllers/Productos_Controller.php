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
            'imagen' => 'required',
        ]);

        $imageName = time().'.'.$request->imagen->extension();  
        $request->imagen->storeAs('public/producto', $imageName);

        $id_producto = new productos([ 
            'Nombre' => $request->input('Nombre'),
            'Descripcion' => $request->input('Descripcion'),
            'Precio' => $request->input('Precio'),
            'Categoria' => $request->input('Categoria'),
            'imagen' => $imageName,]);
            $id_producto->save();

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

    public function update(Request $request, $id_producto)
    {
        // Validar el request
        $validatedData = $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required',
            'Categoria' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ahora la imagen es opcional
        ]);
        $imageName = time().'.'.$request->imagen->extension();  
        $request->imagen->storeAs('public/producto', $imageName);
        // Buscar el registro existente
        $productos = productos::find($id_producto);
        
        if ($productos) {
            $productos->Nombre = $validatedData['Nombre'];
            $productos->Descripcion = $validatedData['Descripcion'];
            $productos->Precio = $validatedData['Precio'];
            $productos->Categoria = $validatedData['Categoria'];
            
            // Verificar si se está actualizando la imagen
            $productos->imagen = $imageName;
            
            $productos->save();
    
            return view('Electromecanica/RYR_ADMIN/admin_update_product', ['productos' => $productos]);
        } else {
            return redirect('Electromecanica/RYR_ADMIN/admin_update_product')->with('error', 'Registro no encontrado');
        }
    }


}


