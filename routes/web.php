<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BedaharaController;
use App\Http\Controllers\KepdesController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileDesaController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SuratBKawinController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\KTPController;
use App\Http\Controllers\SusahaController;






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


// // WEBSITE ROUTERS
Route::get('',[App\Http\Controllers\HomeController::class,'index']);


Route::get('profile','WebController@profile');
Route::get('struktur','OrganisasiController@getStruk');
Route::get('pddk','WebController@index');
Route::get('sementara','WebController@index');
Route::get('datasementara','WebController@gettamu');
Route::get('datakemat','WebController@getkematian');
Route::get('dataindeuk','WebController@getInduk');
Route::get('staffdesa','WebController@staff');
Route::get('/galeris','GaleryController@img');
Route::get('/penguman/{id}','WebController@edit');


Route::controller(LoginController::class)->group(function(){ //ROUTER UNTUK AUNTENTIKASI
    Route::get('login','index')->name('login');
    Route::post('proses','login_action');
    Route::get('logout','logout');
});

Route::group(['middleware' => ['auth']],function(){
    
    //ROUTERS UNTUK LEVEL ADMIN
    Route::group(['middleware'=> ['cek:1']], function(){
        Route::resource('Dashboard/admin',AdminController::class);
        Route::put('editprofile/{id}','AdminController@profile');
        
        Route::resource('penduduk', PendudukController::class);
        // Route::post('addpenduduk','PendudukController@store');
        // Route::delete('deletependuduk/{id}','PendudukController@destroy');
        // Route::put('updatependuduk/{id}','PendudukController@update');
        Route::get('dataexport','PendudukController@export');
        
        // ROUTERS TAMU
        Route::get('indextamu','TamuController@index');
        Route::get('tamu.create','TamuController@create');
        Route::get('tamu.edit/{id}','TamuController@edit');
        Route::post('tamu.store','TamuController@store');
        Route::delete('deletetamu/{id}','TamuController@destroy');
        Route::put('updatetamu/{id}','TamuController@update');
        Route::get('tamuexport','TamuController@export');
        
        // ROUTERS LAYANAN SURAT 
        Route::get('lanyanansurat','LanyananSuratController@index');
        Route::get('pjs','LanyananSuratController@show')->name('pjs');
        Route::get('skj','LanyananSuratController@skj');
        Route::get('downloadpdf','LanyananSuratController@download')->name('downloadpdf');
        Route::get('create','LanyananSuratController@create');
        Route::post('store','LanyananSuratController@store');
        Route::resource('surat',SuratController::class);
        
        Route::get('download/{id}','SuratBaikController@download');
        
        Route::resource('ktp',KTPController::class);
        Route::get('pdfktp/{id}', 'KTPController@download');

        
        Route::resource('skkm',SKKMController::class);
        Route::resource('skk',SkkController::class);
        
        Route::resource('skbb',SuratBaikController::class);
        Route::resource('domisili',DomisiliController::class);
        Route::get('pdfdomisili/{id}','DomisiliController@download');
        
        Route::resource('sbk',SuratBKawinController::class);
        Route::get('menikah/{id}','SuratBKawinController@download');

        Route::resource('sm',SMatiController::class);
        Route::get('smpdf/{id}','SMatiController@download');
        
        Route::resource('su', SusahaController::class);
        Route::get('pdfsu/{id}', 'SusahaController@download');

        // STAFF ROUTERS 
        Route::resource('staff',StaffController::class);
        Route::get('staffexport','StaffController@export');
        
        
        // ROUTERS KEMATIAN 
        Route::resource('kematian',KematianController::class);
        Route::get('exportmati','KematianController@export');
    
        Route::get('user',[App\Http\Controllers\auth\LoginController::class,'register']);
        Route::get('getuser',[App\Http\Controllers\auth\LoginController::class,'getUser']);
        Route::get('change/{id}',[App\Http\Controllers\auth\LoginController::class,'passwordEdit']);
        Route::put('password',[App\Http\Controllers\auth\LoginController::class,'password_action']);
        Route::post('register_acti',[App\Http\Controllers\auth\LoginController::class,'register_acti']);
        Route::post('update-profile', [LoginController::class, 'updateProfile']);

            
            
            // WEBSITE ////////////////////////////

            // ROUTERS 
            Route::resource('info',InfoController::class);
            Route::resource('pgmn',PengumumanController::class);
            Route::get('ditel-pengumuman/{id}','KepdesController@edit');   
            
            Route::resource('galeri',GaleryController::class);
            Route::resource('tanah',TanahController::class);
            Route::resource('t_usaha',UsahaController::class);
            Route::resource('strukt',OrganisasiController::class);
            
            Route::resource('profil',ProfileDesaController::class);

            Route::get('skk/{id}', 'SkkController@download');

            
        });//PENUTUP ROUTERS ADMIN
        
        //ROUTERS UNTUK LEVEL KEPALA DESA
        Route::group(['middleware'=> ['cek:2']], function(){ 
            
            Route::resource('Dashboard/desa',KepdesController::class);
            // penduduk routers 
            Route::get('cetak','PendudukController@export');
            Route::get('datapenduduk','PendudukController@index');
            Route::get('users',[App\Http\Controllers\auth\LoginController::class,'register']);
            
            // penduduk sementara 
            Route::get('datatamu','TamuController@index');
            Route::get('excel','TamuController@export');
            
            // KEMATIAN 
            Route::get('datakematian','KematianController@index');
            Route::get('export','KematianController@export');
            
            // LAYANAN SURAT ROUTERS 
            Route::get('show/{id}',[App\Http\Controllers\SuratController::class,'show']);
            Route::get('reguestsurat','LanyananSuratController@show');
            
            // Route::put('/surat/{id}/approve',[App\Http\Controllers\SuratController::class,'approve']);
            // Route::put('/surat/{id}/reject',[App\Http\Controllers\SuratController::class,'reject']);
            
            // SURAT BAIK 
            Route::get('skbaik','SuratBaikController@index');
            Route::put('/skbaik/{id}/approve','SuratBaikController@approve');
            Route::put('/skbaik/{id}/reject','SuratBaikController@reject');
            Route::get('download2/{id}','SuratBaikController@download');
            Route::get('shows/{id}','SuratBaikController@show');

            // SURAT NIKAH
            Route::get('suratnikah','SuratBKawinController@index');
            Route::put('/sbk/{id}/approve','SuratBKawinController@approve');
            Route::get('/menikah2/{id}','SuratBKawinController@download');

            // SURAT PINDAH 
            Route::get('suratpindah', 'DomisiliController@index');
            Route::get('spindah/{id}', 'DomisiliController@show');
            Route::put('domisili/{id}/approve', 'DomisiliController@approve');
            Route::get('/domisili2/{id}','DomisiliController@download');

            // SURAT KTP
            Route::get('surat_ktp','KTPController@index');
            Route::put('ktp/{id}/approve', 'KTPController@approve');
            Route::get('sktp/{id}', 'KTPController@download');
            
            // SURAT USAHA 
            Route::get('suratusaha','SusahaController@index');
            Route::put('su/{id}/approve', 'SusahaController@approve');
            Route::get('suratusaha/{id}', 'SusahaController@download');

            //SURAT MENINGGAL
            Route::get('smeninggal','SMatiController@index');
            Route::put('sm/{id}/approve', 'SMatiController@approve');
            Route::get('pdfsm/{id}', 'SMatiController@download');

            //SURAT SKK
            Route::get('suratketkwn','SkkController@index');
            Route::put('skk/{id}/approve', 'SkkController@approve');
            Route::get('pdfskk/{id}', 'SkkController@download');
            
            // STAFF 
            Route::get('pegawaidesa','StaffController@index');
            Route::get('exportstaff','StaffController@export');

            // TANAH
            Route::get('t','TanahController@index');
            Route::get('u','UsahaController@index');

            Route::get('view-pengumuman/{id}','KepdesController@edit');
            
            Route::get('passwordEdit/{id}',[App\Http\Controllers\auth\LoginController::class,'passwordEdit']);
            Route::put('password2',[App\Http\Controllers\auth\LoginController::class,'password_action']);
            Route::put('passwordEdit',[App\Http\Controllers\auth\AkunController::class,'updateProfile']);
            Route::get('profile/{id}', 'KepdesController@ubah');
            Route::put('profile_update/{id}', 'KepdesController@profile');
            Route::put('update/{id}', 'KepdesController@update');
            
            Route::get('adduser',[App\Http\Controllers\auth\LoginController::class,'register'])->name('adduser');
        });//PENUTUP ROUTERS UNTUK LEVEL KEPALA DESA
        
        //ROUTERS UNTUK LEVEL BEDAHARA
        Route::group(['middleware'=> ['cek:3']], function(){  
            Route::resource('Dashboard/bedahara',BedaharaController::class);

            Route::get('password/{id}',[App\Http\Controllers\auth\LoginController::class,'passwordEdit']);
            Route::put('password',[App\Http\Controllers\auth\LoginController::class,'password_action']);

            Route::get('tdkematian','KematianController@index');
            Route::get('tamu','KematianController@index');
            Route::get('pendudukinduk','KematianController@index');
            Route::get('surat','SuratController@index');
            Route::get('pengumuman/{id}','BedaharaController@edit');
          
            
            // keuagan 
                Route::resource('keuangan', KeuanganController::class);
                Route::resource('danadesa', DanaController::class);

        }); //PENUTUP ROUTERS UNTUK LEVEL BEDAHARA
        
    
    });

    

