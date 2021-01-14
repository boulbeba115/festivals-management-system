<?php

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


Route::get('/dashboard', 'DashboardController@index');
$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 $this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['web','auth']], function(){
 
    Route::get('/dashboard', function() {
      if (Auth::user()->admin == 0) {
        
        return redirect('/');
        } 
        else 
        {
        return view('dashboard');
        }
    });
    /*-------------------------toute de parti SPonseur------------------------------ */
    Route::get('sponseurs/affect', 'SponseurController@affect');
    Route::Post('affectspon', 'SponseurController@affecter');
    Route::DELETE('affectspon/{id}/{id2}', 'SponseurController@suppaffect');
    Route::resource('sponseurs', 'SponseurController');
    /*--------------------- toute de parti Partenaire media---------------------  */
    Route::get('partmedia/affect', 'PartmediaController@affect');
    Route::Post('affectpm', 'PartmediaController@affecter');
    Route::DELETE('affectpm/{id}/{id2}', 'PartmediaController@suppaffect');
    Route::resource('partmedia', 'PartmediaController');
    /*---------------------route de parti musique ---------------------  */
    Route::get('music/affect', 'MusicController@affect');
    Route::Post('affectmusic', 'MusicController@affecter');
    Route::DELETE('affectmusic/{id}/{id2}', 'MusicController@suppaffect');
    Route::resource('music', 'MusicController');
    /*---------------------route Scene ---------------------  */
    Route::resource('scene', 'SceneController');
    /*---------------------route Point Vente ---------------------  */
    Route::get('pointvente/affect', 'PointventeController@affect');
    Route::Post('affectpv', 'PointventeController@affecter');
    Route::DELETE('affectpv/{id}/{id2}', 'PointventeController@suppaffect');
    Route::resource('pointvente', 'PointventeController');
    /*---------------------route Actualité ---------------------  */
    Route::resource('actualite', 'ActualiteController');
    /*---------------------route Festivale ---------------------  */
    Route::post('selectfestivale', 'FestivaleController@select');
    Route::resource('festivale', 'FestivaleController');
    /*---------------------route Artist ---------------------  */
    Route::resource('artiste', 'ArtistController');
    /*---------------------route soire ---------------------  */
    Route::resource('soire', 'SoireController');
    /*---------------------route Spectacle ---------------------  */
    Route::resource('spectacle', 'SpectacleController');
    /*---------------------route Ticket ---------------------  */
    Route::resource('ticket', 'TicketController');
    /*---------------------route affecter ticket---------------------  */
    Route::resource('affectticket', 'AffectticketController');
    Route::DELETE('affectticket/{id}/{id2}', 'AffectticketController@suppaffect');
    /***************************************************************** */
    /*---------------------route les reservation---------------------  */
    Route::resource('lesreservation', 'LesreservationController');
    /***************************************************************** */
  });
    Route::get('/', 'IndexController@index');
    Route::post('dynamic_dependent/fetch', 'IndexController@fetch')->name('dynamicdependent.fetch');
    Route::post('reserver', 'IndexController@reserver')->name('reserver');
/*******************************************************************/

Route::get('/user', 'IndexController@ind')->middleware('auth');
Route::get('/user/pdf/{id}', 'IndexController@pdf')->middleware('auth');

Route::get('erreur','IndexController@test')->name('erreur');

/********************La Page n'est pas trouver erreur **************** */
Route::get('404','IndexController@pagepastrouver')->name('404');
Route::get('500','IndexController@errintern')->name('500');
Route::get('map',function(){return view('map');});


