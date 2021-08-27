<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

/* 
Route::get('/test', function(){
    $user = new App\User;
    $user->nombre = 'Rashel';
    $user->apellido = 'Alvarez';
    $user->email = 'rashelalvarez21@gmail.com';
    $user->password = bcrypt('123456');
    $user->save();

    return $user;

}); */

Route::get('/', 'InicioController@index' );
Route::get('nosotros', 'NosotrosController@index' );
Route::get('recetas', 'RecetasController@index' );
 
Route::get('productos', 'ProductosController@index' );
Route::get('login', 'LoginController@showLoginForm' );

Route::get('contacto', 'ContactoController@index' );

Route::post('contacto', 'ContactoController@store' )->name('contacto-create'); 
/* Route::get('registrar', 'RegistroController@index' );
Route::post('registrar', 'RegistroController@store')->name('registrar.store'); */

 Route::resource('detalle', 'DetalleController');

Auth::routes();

/* Route::get('/home', 'HomeController@index')->name('home'); */
/* Route::get('/home', function(){
    if(Auth::User())
    if(Auth::User()->role_id == '1')
    return redirect('cliente');
    else
    return redirect('admin/index');
    else
    return redirect('login');
});

Route::get('/', function () {
    if( Auth::user() ) //se valida si esta logueado
        if( Auth::user()->rol =='admin' ) //se valida el tipo de usuario
            return redirect('/admin');
        else
            return redirect('/normal');
    else
        return redirect('/login');
});
 */

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::resource('/usuarios', 'UsuarioController');
Route::post('/usuariosindex', 'UsuarioController@index');
/* Route::post('/usuariosedit', 'UsuarioController@editt'); */
Route::resource('/clientes', 'ClientesController');

Route::resource('/productad', 'ProductAdController');
Route::get('/productad/{productad}/mostrarProductos', 'ProductAdController@mostrarProductos')->name('mostrarProductos');

Route::post('/cart/add', 'CartController@add')->name('cart.add');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('/cart/remove', 'CartController@removeitem')->name('cart.removeitem');
Route::post('/cart/clear', 'CartController@clear')->name('cart.clear');

Route::resource('/pedidos', 'PedidosController');
Route::post('/pedidosvendedor', 'PedidosVendedorController@store')->name('pedidosvendedor.store');
/* 

Route::put('actualizar-usuario/{usuario}', 'UsuarioController@update'); */
Route::get('/pedidos/{pedido}/mostrarOrden', 'PedidosController@mostrarOrden')->name('mostrarOrden');

Route::resource('/vendedor', 'VendedorController');
Route::resource('/costos', 'CostosController');
Route::get('/usuarios/{getrole}/getrole', 'UsuarioController@getrole')->name('getrole');

 