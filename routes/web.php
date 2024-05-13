<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Empleados_Controller;
use App\Http\Controllers\Productos_Controller;
use App\Http\Controllers\Proveedores_Controller;
use App\Http\Controllers\Gestiondeinventarios_Controller;
use App\Http\Controllers\Usuario_Controller;
use App\Http\Controllers\Servicio_Controller;
use App\Http\Controllers\Reservas_Controller;
use App\Http\Controllers\Pedido_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('inicio');
Route::get('/carrito', [CartController::class, 'index'])->name('carrito');
Route::post('/checkout', [CheckoutController::class, 'processPayment'])->name('checkout');
Route::get('/producto/{id}', [ProductController::class, 'addToCart'])->name('agregar_carrito');


Route::get('/', function () {
    return view('Electromecanica/Home/index');
});

Route::get("/administrador", function () {
    return view('Electromecanica/RYR_ADMIN/admin_page'); 
}) ->name("Admin");

Route::get("/productos", function () {
    return view('Electromecanica/Home/productos'); 
}) ->name("producto");


Route::get("/Inicio", function () {
    return view('Electromecanica/Home/index'); 
}) ->name("Inicio");

Route::get("/formu", function () {
    return view('Electromecanica/Home/login'); 
}) ->name("Formulario");

Route::get('/dashboard', function () {
    return view('Electromecanica/RYR_ADMIN/admin_page');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

//EMPLEADO

Route::get('/administrador/empleado/registro', [Empleados_Controller::class, 'index_empleado'])->name('inicio_empleado');
Route::get('/empleados/{id_empleado}', [Empleados_Controller::class, 'edit'])->name('edi_emp');
Route::post('/administrador/empleado/registro', [Empleados_Controller::class, 'create'])->name('registrar_empleado');
Route::delete('/formu/empleado/{id_empleado}', [Empleados_Controller::class , 'destroy'])->name('eliminar_empleado');
Route::get('/formu/empleado/{id_empleado}', [Empleados_Controller::class , 'show'])->name('mostrar_empleado');
Route::patch('/formu/empleado/{id_empleado}', [Empleados_Controller::class , 'update'])->name('editar_empleado');

Route::post('/show/empleado', function () { return view(("Electromecanica/RYR_ADMIN/admin_employees"));}) -> name("show_empleado");
Route::get('/administrador/empleado', function () {return view(("Electromecanica/RYR_ADMIN/admin_employees")) ;}) -> name( 'listarEmpleado' );
Route::get('/administrador/empleado/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_employees');}) -> name("registro_emp");

//PRODUCTOS

Route::get('/administrador/producto/registro', [Productos_Controller::class, 'index_producto'])->name('inicio_producto');
Route::get('/productos/{id_producto}', [Productos_Controller::class, 'edit'])->name('edi_produc');
Route::post('/administrador/producto/registro', [Productos_Controller::class, 'create'])->name('registrar_producto');
Route::delete('/formu/producto/{id_producto}', [Productos_Controller::class , 'destroy'])->name('eliminar_producto');
Route::get('/formu/producto/{id_producto}', [Productos_Controller::class , 'show'])->name('mostrar_producto');
Route::patch('/formu/producto/{id_producto}', [Productos_Controller::class , 'update'])->name('editar_producto');

Route::post('/show/producto', function () { return view(("Electromecanica/RYR_ADMIN/admin_products"));}) -> name("show_producto");
Route::get('/administrador/producto', function () {return view(("Electromecanica/RYR_ADMIN/admin_products")) ;}) -> name( 'listarproducto' );
Route::get('/administrador/producto/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_products');}) -> name("registro_pro");

//PROVEEDORES

Route::get('/administrador/proveedor/registro', [Proveedores_Controller::class, 'index_proveedor'])->name('inicio_proveedor');
Route::get('/proveedores/{id_proveedor}', [Proveedores_Controller::class, 'edit'])->name('edi_prov');
Route::post('/administrador/proveedor/registro', [Proveedores_Controller::class, 'create'])->name('registrar_proveedor');
Route::delete('/formu/proveedor/{id_proveedor}', [Proveedores_Controller::class , 'destroy'])->name('eliminar_proveedor');
Route::get('/formu/proveedor/{id_proveedor}', [Proveedores_Controller::class , 'show'])->name('mostrar_proveedor');
Route::patch('/formu/proveedor/{id_proveedor}', [Proveedores_Controller::class , 'update'])->name('editar_proveedor');

Route::post('/show/proveedor', function () { return view(("Electromecanica/RYR_ADMIN/admin_suppliers"));}) -> name("show_proveedor");
Route::get('/administrador/proveedor', function () {return view(("Electromecanica/RYR_ADMIN/admin_suppliers")) ;}) -> name( 'listarproveedor' );
Route::get('/administrador/proveedor/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_suppliers');}) -> name("registro_prov");

//INVENTARIOS

Route::get('/administrador/inventario/registro', [Gestiondeinventarios_Controller::class, 'index_inventario'])->name('inicio_inventario');
Route::get('/inventarios/{id_inventario}', [Gestiondeinventarios_Controller::class, 'edit'])->name('edi_prov');
Route::post('/administrador/inventario/registro', [Gestiondeinventarios_Controller::class, 'create'])->name('registrar_inventario');
Route::delete('/formu/inventario/{id_inventario}', [Gestiondeinventarios_Controller::class , 'destroy'])->name('eliminar_inventario');
Route::get('/formu/inventario/{id_inventario}', [Gestiondeinventarios_Controller::class , 'show'])->name('mostrar_inventario');
Route::patch('/formu/inventario/{id_inventario}', [Gestiondeinventarios_Controller::class , 'update'])->name('editar_inventario');

Route::post('/show/inventario', function () { return view(("Electromecanica/RYR_ADMIN/admin_inventories"));}) -> name("show_inventario");
Route::get('/administrador/inventario', function () {return view(("Electromecanica/RYR_ADMIN/admin_inventories")) ;}) -> name('listarinventario');
Route::get('/administrador/inventario/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_inventories');}) -> name("registro_inv");

//USUARIO

Route::get('/administrador/usuario/registro', [Usuario_Controller::class, 'index_usuario'])->name('inicio_usuario');
Route::get('/usuarios/{id_usuario}', [Usuario_Controller::class, 'edit'])->name('edi_usu');
Route::post('/administrador/usuarios/registro', [Usuario_Controller::class, 'create'])->name('registrar_usuario');
Route::delete('/formu/usuarios/{id_usuario}', [Usuario_Controller::class , 'destroy'])->name('eliminar_usuario');
Route::get('/formu/usuario/{id_usuario}', [Usuario_Controller::class , 'show'])->name('mostrar_usuario');
Route::patch('/formu/usuario/{id_usuario}', [Usuario_Controller::class , 'update'])->name('editar_usuario');

Route::post('/show/usuario', function () { return view(("Electromecanica/RYR_ADMIN/admin_users"));}) -> name("show_usuario");
Route::get('/administrador/usuario', function () {return view(("Electromecanica/RYR_ADMIN/admin_users")) ;}) -> name('listarusuario');
Route::get('/administrador/usuario/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_users');}) -> name("registro_usu");

//SERVICIOS

Route::get('/administrador/servicio/registro', [Servicio_Controller::class, 'index_servicio'])->name('inicio_servicio');
Route::get('/sevicios/{id_servicio}', [Servicio_Controller::class, 'edit'])->name('edi_ser');
Route::post('/administrador/servicios/registro', [Servicio_Controller::class, 'create'])->name('registrar_servicio');
Route::delete('/formu/servicios/{id_servicio}', [Servicio_Controller::class , 'destroy'])->name('eliminar_servicio');
Route::get('/formu/servicio/{id_servicio}', [Servicio_Controller::class , 'show'])->name('mostrar_servicio');
Route::patch('/formu/servicio/{id_servicio}', [Servicio_Controller::class , 'update'])->name('editar_servicio');

Route::post('/show/servicio', function () { return view(("Electromecanica/RYR_ADMIN/admin_servicios"));}) -> name("show_servicio");
Route::get('/administrador/servicio', function () {return view(("Electromecanica/RYR_ADMIN/admin_servicios")) ;}) -> name('listarservicio');
Route::get('/administrador/servicio/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_servicios');}) -> name("registro_ser");

//RESERVAS

Route::get('/administrador/reserva/registro', [Reservas_Controller::class, 'index_reserva'])->name('inicio_reserva');
Route::get('/reservas/{id_reserva}', [Reservas_Controller::class, 'edit'])->name('edi_reser');
Route::post('/administrador/reservas/registro', [Reservas_Controller::class, 'create'])->name('registrar_reserva');
Route::delete('/formu/reservas/{id_reserva}', [Reservas_Controller::class , 'destroy'])->name('eliminar_reserva');
Route::get('/formu/reserva/{id_reserva}', [Reservas_Controller::class , 'show'])->name('mostrar_reserva');
Route::patch('/formu/reserva/{id_reserva}', [Reservas_Controller::class , 'update'])->name('editar_reserva');

Route::post('/show/reserva', function () { return view(("Electromecanica/RYR_ADMIN/admin_reserva"));}) -> name("show_reserva");
Route::get('/administrador/reserva', function () {return view(("Electromecanica/RYR_ADMIN/admin_reserva")) ;}) -> name('listarreserva');
Route::get('/administrador/reserva/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_reserva');}) -> name("registro_reser");

//PEDIDOS

Route::get('/administrador/pedido/registro', [Pedido_Controller::class, 'index_pedido'])->name('inicio_pedido');
Route::get('/pedidos/{id_pedido}', [Pedido_Controller::class, 'edit'])->name('edi_pedi');
Route::post('/administrador/pedidos/registro', [Pedido_Controller::class, 'create'])->name('registrar_pedido');
Route::delete('/formu/pedidos/{id_pedido}', [Pedido_Controller::class , 'destroy'])->name('eliminar_pedido');
Route::get('/formu/pedido/{id_pedido}', [Pedido_Controller::class , 'show'])->name('mostrar_pedido');
Route::patch('/formu/pedido/{id_pedido}', [Pedido_Controller::class , 'update'])->name('editar_pedido');

Route::post('/show/pedido', function () { return view(("Electromecanica/RYR_ADMIN/admin_pedido"));}) -> name("show_pedido");
Route::get('/administrador/pedido', function () {return view(("Electromecanica/RYR_ADMIN/admin_pedido")) ;}) -> name('listarpedido');
Route::get('/administrador/pedido/registro', function () {return view('Electromecanica/RYR_ADMIN/admin_pedido');}) -> name("registro_pedi");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


