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

// Route::get('/', function () {
//     return view('login');
// });


Route::get('/', 'Controller@login');
Route::post('/add_admin', 'Controller@addadmin');
Route::post('/create_mhs', 'Controller@addmhs');
Route::get('/forpass', function () { return view('forpass'); });
Route::get('/sendpass', 'Controller@sendpass');
Route::get('/actlog', 'Controller@actlog');

Route::get('/admin', 'CoAdmin@home');
Route::post('/admin:upd={id}', 'CoAdmin@updakun');

Route::get('/dataprodi', 'CoAdmin@dtprodi');
Route::post('/add_prodi', 'CoAdmin@addprodi');
Route::post('/prodi:upd={id}', 'CoAdmin@updprodi');
Route::get('/prodi:del={id}', 'CoAdmin@delprodi');

// Route::get('/datamhs', 'CoAdmin@dtmhs');
Route::get('/mhs:prodi={id}', 'CoAdmin@dtmhs');
Route::post('/imp_mhs', 'CoAdmin@impmhs');
Route::post('/add_mhs', 'CoAdmin@addmhs');
Route::post('/mhs:upd={id}', 'CoAdmin@updmhs');
Route::get('/mhs:del={id}', 'CoAdmin@delmhs');


Route::get('/datasoal', 'CoAdmin@dtsoal');
Route::post('/add_soal', 'CoAdmin@addsoal');
Route::post('/soal:upd={id}', 'CoAdmin@updsoal');
Route::get('/soal:del={id}', 'CoAdmin@delsoal');
Route::post('/update_waktu', 'CoAdmin@updwkt');

Route::get('/prodi:mhs={id}', 'CoAdmin@dthasil');
Route::get('/hasil:res={id}', 'CoAdmin@reshasil');
Route::get('/ex_res', 'CoAdmin@exhasil');



Route::get('/mhs', 'CoMhs@home');
Route::get('/masuk', 'CoMhs@masuk');
Route::get('/mulai', 'CoMhs@mulai');
Route::get('/habis', 'CoMhs@habis');
Route::post('/akun:upd={id}', 'CoMhs@updakun');

Route::get('/soal', 'CoMhs@soal');
Route::get('/soal1', 'CoMhs@soal2');
Route::get('/soal2', 'CoMhs@soal3');
Route::get('/soal3', 'CoMhs@soal4');
Route::get('/soal4', 'CoMhs@soal5');
Route::get('/soal5', 'CoMhs@soal6');
Route::get('/soal6', 'CoMhs@soal7');
Route::get('/soal7', 'CoMhs@kersoal');
Route::get('/hasil', 'CoMhs@hasil');



Route::get('/logsoal', 'Controller@logsoal');
Route::get('/logout', 'Controller@logout');
