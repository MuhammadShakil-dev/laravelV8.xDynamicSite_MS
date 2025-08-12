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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/hr/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('hr.dashboard');


///////////////////////////////////////////////////////////////////////////////////////////////////
// Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
//or
Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index');


Route::get('about-us', 'App\Http\Controllers\Frontend\FrontendController@aboutUs')->name('about.us');
Route::get('contact-us', 'App\Http\Controllers\Frontend\FrontendController@contactUs')->name('contact.us');
Route::get('/news_events/details/{id}', 'App\Http\Controllers\Frontend\FrontendController@NewsDetails')->name('news_events_details');

Route::get('/our/mission', 'App\Http\Controllers\Frontend\FrontendController@mission')->name('our.mission');
Route::get('/our/vision', 'App\Http\Controllers\Frontend\FrontendController@vision')->name('our.vision');
Route::get('/news/events', 'App\Http\Controllers\Frontend\FrontendController@newsEvents')->name('our.news.events');
Route::post('/contact/store', 'App\Http\Controllers\Frontend\FrontendController@userMsgContactStore')->name('contact.store');


///////////////////////////////////////////////////////////////////////////////////////////////////

  //middleweare using for all route to secure  url
Route::group(['middleware'=>'auth'],function(){
   Route::prefix('users')->group(function(){
    Route::get('/view', 'App\Http\Controllers\Backend\UserController@viewUser')->name('users.view');
    Route::get('/add', 'App\Http\Controllers\Backend\UserController@addUser')->name('users.add');
    Route::post('/store', 'App\Http\Controllers\Backend\UserController@storeUser')->name('users.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Backend\UserController@editUser')->name('users.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\UserController@updateUser')->name('users.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\Backend\UserController@deleteUser')->name('users.delete');
   }); 


   Route::prefix('profiles')->group(function(){
    Route::get('/view', 'App\Http\Controllers\Backend\ProfileController@viewProfile')->name('profiles.view');
    Route::get('/edit', 'App\Http\Controllers\Backend\ProfileController@editProfile')->name('profiles.edit');
    Route::post('/store', 'App\Http\Controllers\Backend\ProfileController@updateProfile')->name('profiles.update');
    Route::get('/password/view', 'App\Http\Controllers\Backend\ProfileController@passwordView')->name('profiles.password.view');
    Route::post('/password/update', 'App\Http\Controllers\Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
   });


  Route::prefix('logos')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\LogoController@viewLogo')->name('logos.view');
   Route::get('/add', 'App\Http\Controllers\Backend\LogoController@addLogo')->name('logos.add');
   Route::post('/store', 'App\Http\Controllers\Backend\LogoController@storeLogo')->name('logos.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\LogoController@editLogo')->name('logos.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\LogoController@updateLogo')->name('logos.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\LogoController@deleteLogo')->name('logos.delete');
    });


  Route::prefix('sliders')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\SliderController@viewSlider')->name('sliders.view');
   Route::get('/add', 'App\Http\Controllers\Backend\SliderController@addSlider')->name('sliders.add');
   Route::post('/store', 'App\Http\Controllers\Backend\SliderController@storeSlider')->name('sliders.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SliderController@editSlider')->name('sliders.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\SliderController@updateSlider')->name('sliders.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\SliderController@deleteSlider')->name('sliders.delete');
   });


  Route::prefix('missions')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\MissionController@viewMission')->name('missions.view');
   Route::get('/add', 'App\Http\Controllers\Backend\MissionController@addMission')->name('missions.add');
   Route::post('/store', 'App\Http\Controllers\Backend\MissionController@storeMission')->name('missions.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\MissionController@editMission')->name('missions.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\MissionController@updateMission')->name('missions.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\MissionController@deleteMission')->name('missions.delete');
   });


  Route::prefix('visions')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\VisionController@viewVision')->name('visions.view');
   Route::get('/add', 'App\Http\Controllers\Backend\VisionController@addVision')->name('visions.add');
   Route::post('/store', 'App\Http\Controllers\Backend\VisionController@storeVision')->name('visions.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\VisionController@editVision')->name('visions.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\VisionController@updateVision')->name('visions.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\VisionController@deleteVision')->name('visions.delete');
   });


  Route::prefix('news_events')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\NewsEventController@viewNewsEvent')->name('news_events.view');
   Route::get('/add', 'App\Http\Controllers\Backend\NewsEventController@addNewsEvent')->name('news_events.add');
   Route::post('/store', 'App\Http\Controllers\Backend\NewsEventController@storeNewsEvent')->name('news_events.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\NewsEventController@editNewsEvent')->name('news_events.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\NewsEventController@updateNewsEvent')->name('news_events.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\NewsEventController@deleteNewsEvent')->name('news_events.delete');
   });


  Route::prefix('services')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\ServiceController@viewService')->name('services.view');
   Route::get('/add', 'App\Http\Controllers\Backend\ServiceController@addService')->name('services.add');
   Route::post('/store', 'App\Http\Controllers\Backend\ServiceController@storeService')->name('services.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ServiceController@editService')->name('services.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\ServiceController@updateService')->name('services.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ServiceController@deleteService')->name('services.delete');
   });


  Route::prefix('contacts')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\ContactController@viewContact')->name('contacts.view');
   Route::get('/add', 'App\Http\Controllers\Backend\ContactController@addContact')->name('contacts.add');
   Route::post('/store', 'App\Http\Controllers\Backend\ContactController@storeContact')->name('contacts.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ContactController@editContact')->name('contacts.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\ContactController@updateContact')->name('contacts.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ContactController@deleteContact')->name('contacts.delete');

   Route::get('/userMsg', 'App\Http\Controllers\Backend\ContactController@userMsgView')->name('contacts.userMsg');
   Route::get('/deleteuserMsg/{id}', 'App\Http\Controllers\Backend\ContactController@deleteUserMsg')->name('contacts.deleteuserMsg');


   });

  Route::prefix('abouts')->group(function(){
   Route::get('/view', 'App\Http\Controllers\Backend\AboutController@viewAbout')->name('abouts.view');
   Route::get('/add', 'App\Http\Controllers\Backend\AboutController@addAbout')->name('abouts.add');
   Route::post('/store', 'App\Http\Controllers\Backend\AboutController@storeAbout')->name('abouts.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\AboutController@editAbout')->name('abouts.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\AboutController@updateAbout')->name('abouts.update');
   Route::get('/delete/{id}', 'App\Http\Controllers\Backend\AboutController@deleteAbout')->name('abouts.delete');
   });

});

