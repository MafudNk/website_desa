<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EcommerceController;
use Illuminate\Auth\AuthenticationException;
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

Route::get('/', [FrontController::class, 'index']);
Route::get('/profile_desa/{slug}', [FrontController::class, 'desa']);
Route::get('/berita/{slug}', [FrontController::class, 'berita']);
Route::get('/dinamo', [FrontController::class, 'katalog_dinamo']);
Route::get('/dinamo/{slug}', [FrontController::class, 'item_dinamo']);
Route::get('/layanan', [FrontController::class, 'katalog_layanan']);
Route::get('/layanan/{slug}', [FrontController::class, 'item_layanan']);
Route::get('/umkm', [FrontController::class, 'katalog_umkm']);
Route::get('/umkm/{slug}', [FrontController::class, 'item_umkm']);
Route::get('/market', [FrontController::class, 'katalog_market']);
Route::get('/market/{slug}', [FrontController::class, 'item_market']);

//login register
Route::get('login', array('as' => 'login', function () {
    return view('admin/login_page/login');
}));
Route::post('/check_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registering', [AuthController::class, 'register_process']);


//All Admin Privilege Page and Process
Route::group(['middleware' => ['auth']], function () {
    //Page Load System
    /* user admin */
    Route::get('/dashboard', [AdminController::class, 'home']);
    Route::get('/user', [AdminController::class, 'user']);
    Route::get('/user_destroy/{id}', [AdminController::class, 'user_destroy']);

    /*Ecommerce*/
    Route::get('/ecommerce', [AdminController::class, 'ecommerce']);
    Route::get('/add_ecommerce', [AdminController::class, 'ecommerce_add']);
    Route::get('/delete_ecommerce/{id}', [AdminController::class, 'ecommerce_destroy']);

    /* Berita */
    Route::get('/berita', [AdminController::class, 'berita']);
    Route::post('/berita_add', [AdminController::class, 'berita_add']);
    Route::post('/berita_edit/{id}', [AdminController::class, 'berita_edit']);
    Route::get('/delete_berita/{id}', [AdminController::class, 'berita_destroy']);

    /* Pelaku Usaha */
    Route::get('/pelaku_usaha', [AdminController::class, 'pelaku_usaha']);
    Route::post('/add_pelaku_usaha', [AdminController::class, 'pelaku_usaha_add']);
    Route::post('/edit_pelaku_usaha/{id}', [AdminController::class, 'pelaku_usaha_edit']);
    Route::get('/delete_pelaku_usaha/{id}', [AdminController::class, 'pelaku_usaha_destroy']);

    //Post Form System
    Route::post('/user', [AdminController::class, 'user_store']);
    Route::post('/user_edit/{id}', [AdminController::class, 'user_edit']);
    Route::post('/store_ecommerce', [AdminController::class, 'ecommerce_store']);
    Route::post('/edit_ecommerce/{id}', [AdminController::class, 'ecommerce_edit']);

    /*Produk Layanan*/
    Route::get('/produk', [AdminController::class, 'produk']);
    Route::post('/add_produk', [AdminController::class, 'produk_add']);
    Route::post('/edit_produk/{id}', [AdminController::class, 'produk_edit']);
    Route::get('/delete_produk/{id}', [AdminController::class, 'produk_destroy']);

    /*Produk Ecommerce*/
    Route::get('/produk_ecommerce', [AdminController::class, 'produk_ecommerce']);
    Route::get('/produk_ecommerce/ajax', [AdminController::class, 'ajax']);
    Route::post('/add_produk_ecommerce', [AdminController::class, 'add_produk_ecommerce']);
    Route::post('/edit_produk_ecommerce/{id}', [AdminController::class, 'edit_produk_ecommerce']);
    Route::get('/delete_produk_ecommerce/{id}', [AdminController::class, 'produk_ecommerce_destroy']);

    /* Foto & Video */
    Route::get('/foto_video', [AdminController::class, 'foto_video']);
    Route::post('/add_foto_video', [AdminController::class, 'foto_video_add']);
    Route::post('/edit_foto_video/{id}', [AdminController::class, 'foto_video_edit']);
    Route::get('/delete_foto_video/{id}', [AdminController::class, 'foto_video_destroy']);

    /*Rekomendasi */
    Route::get('/rekomendasi', [AdminController::class, 'rekomen']);
    Route::post('/add_rekomendasi', [AdminController::class, 'rekomen_add']);
    Route::post('/edit_rekomendasi/{id}', [AdminController::class, 'rekomen_edit']);
    Route::get('/delete_rekomendasi/{id}', [AdminController::class, 'rekomen_destroy']);

    /* Desa */
    Route::get('/desa', [AdminController::class, 'desa']);
    Route::post('/desa_edit/{id}', [AdminController::class, 'desa_edit']);
});
