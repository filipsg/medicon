<?php

// RUTAS PARA EL FRONT

Route::get('/', 'Front\PaginasController@inicio')->name('inicio');
Route::get('/nosotros', 'Front\PaginasController@nosotros')->name('nosotros');
Route::get('/servicios', 'Front\PaginasController@servicios')->name('servicios');
Route::get('/contacto', 'Front\PaginasController@contacto')->name('contacto');
// RUTA PARA CARGAR UNA AGENDA- para probar que se cree un calendario
//Route::get('calendario',function(){ return view('calendario');});
// 2018-05-30 Route::get('/calendario','Agenda\AgendasController@index');
Route::resource('admin/calendario','Agenda\AgendasController');

/// RUTAS PARA LA ADMINISTRACION
Route::get('/admin', function(){
	return view('admin.inicio');
});
// 2018-08-07: una de las formas de usar el middelware, pero lo mas comun es realizarlo en el controlador en al funcion contructor
//})->middleware('auth');


Route::resource('admin/usuarios', 'Usuarios\UsuariosController');
Route::resource('admin/medicos', 'Usuarios\MedicosController');
Route::resource('admin/proveedores', 'Contabilidad\ProveedoresController');
Route::resource('admin/productos', 'Contabilidad\ProductosController');

// 2018-05-16: ruta para exportar PDF de usaurio
Route::get('usuarios-pdf', 'Usuarios\UsuariosController@exportarPDF')->name('pdfusuarios');
// 2018-05-16: ruta para exportar Excel de usaurio
Route::get('usuarios-excel', 'Usuarios\UsuariosController@exportarExcel')->name('excelusuarios');
// ruta para importar excel de usarios
Route::get('usuarios-importar', 'Usuarios\UsuariosController@importarExcel')->name('importarusuarios');




// rutas de autenticacion.
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
