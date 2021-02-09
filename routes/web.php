<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');;
//Route::view('/', 'about');

Route::resource('Post', 'PostController');
Route::view('/about', 'about')->name('about');
Route::get('/post/archive','PostController@archive')->name('archive');
Route::get('/secret','Homecontroller@secret')
->middleware('can:secret.page')
->name('secret');
Route::get('/post/all','PostController@all')->name('all');
Auth::routes();
Route::patch('/post/{id}/restore','PostController@restore');
Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/post/{id}/forcedelete','PostController@forcedelete');
Route::get('/posts/tag/{id}','PostTagsController@index')
->name('post.tag');
Route::resource('posts.comments', 'PostCommentsController')
->only(['store','show']);
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::resource('users', 'UserController');
Route::resource('user.comments', 'UserCommentController')
->only(['store']);

Auth::routes();
 Route::resource('Etablissement','EtablissementController');

 Route::resource('Etudiant', 'EtudiantController');


Route::get('/encadrantpedagogique','EncadrantController@showpedagogiqueencadrant')
->name('encadrantpedagogique')
;
Route::get('/encadrantcompany','EncadrantController@showcompanyencadant')->name('encadrantcompany');

Route::get('/add','Auth\RegisterController@store')->name('add');

Route::post('/registerentreprise','Auth\RegisterController@createentreprise')
->name('registerentreprise');
;

Route::get('/logincompany','Auth\LoginController@log')->name('logincompany');

Route::post('/loginentreprise','Auth\LoginController@Loginentreprise')
->name('loginentreprise');
;
Route::resource('CompanyEncadrant', 'CompanyencadrantController');

Route::resource('Pedagogiqueencadrant', 'PedagogiqueencadrantController');
Route::patch('/etudiant/{id}/restore','EtudiantController@restore');
Route::delete('/etudiant/{id}/forcedelete','EtudiantController@forcedelete');

Route::patch('/encadrantpedagagogiue/{id}/restore','PedagogiqueencadrantController@restore');
Route::delete('/encadrantpedagagogiue/{id}/forcedelete','PedagogiqueencadrantController@forcedelete');

Route::resource('Entreprise', 'EntrepriseController');

Route::resource('Affectation', 'AffectationController');
Route::resource('Soutenance', 'SoutenanceController');


Route::get('/logetudiant','Auth\LoginController@logetudiant')->name('logetudiant');
Route::post('/loginetudiant','Auth\LoginController@loginetudiant')
->name('loginetudiant');


Route::get('/logencadrant','Auth\LoginController@logencadrant')->name('logencadrant');
Route::post('/loginencadrant','Auth\LoginController@loginencadrant')
->name('loginencadrant');


Route::get('/logpedagogique','Auth\LoginController@logpedagogique')->name('logpedagogique');
Route::post('/loginpredagogique','Auth\LoginController@loginpredagogique')
->name('loginpredagogique');


Route::get('voiretudiant','EtablissementController@afficher')->name('voiretudiant');

Route::get('voirencadrant','CompanyencadrantController@afficher')->name('voiretudiant');


Route::get('voirpedagogique','PedagogiqueencadrantController@afficher')->name('voirpedagogique');



Route::put('/etablissment/{id}/activer1','EtudiantController@activer1');


Route::put('/etablissment/{id}/activer2','EtudiantController@activer2');


Route::put('/etablissment/{id}/activer3','EtudiantController@activer3');


Route::put('/etablissment/{id}/activer4','EtudiantController@activer4');



Route::get('/indexPost','PostController@indexPost')->name('indexPost');




Route::put('/encadrant/{id}/note','SoutenanceController@editnoteencadrant');

Route::put('/pedagogique/{id}/note','SoutenanceController@editnotepedagogique');

Route::put('/jury1/{id}/note','SoutenanceController@editnotejury');
Route::put('/jury2/{id}/note','SoutenanceController@editnotejury2');
