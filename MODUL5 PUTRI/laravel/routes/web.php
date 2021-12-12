<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Vaccine;
use App\Http\Controllers\Patient;
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

Route::get('/', [Home::class, 'index'])->name('home');  

Route::get('/vaccine', [Vaccine::class, 'index'])->name('vaccine.index');  
Route::get('/vaccine/add', [Vaccine::class, 'add'])->name('vaccine.add');  
Route::post('/vaccine/insert', [Vaccine::class, 'insertData'])->name('vaccine.insert');  
Route::get('/vaccine/edit/{id}', [Vaccine::class, 'edit'])->name('vaccine.edit');  
Route::patch('/vaccine/update/{id}', [Vaccine::class, 'update'])->name('vaccine.update');   
Route::get('/vaccine/delete/{id}', [Vaccine::class, 'delete'])->name('vaccine.delete');

Route::get('/patient', [Patient::class, 'index'])->name('patient.index');  
Route::get('/patient/get_vaccine', [Patient::class, 'get_vaccine'])->name('patient.get_vaccine');  
Route::post('/patient/add', [Patient::class, 'add'])->name('patient.add');  
Route::post('/patient/insert', [Patient::class, 'insert'])->name('patient.insert');  
Route::get('/patient/edit/{id}', [Patient::class, 'edit'])->name('patient.edit');  
Route::patch('/patient/update/{id}', [Patient::class, 'update'])->name('patient.update');   
Route::get('/patient/delete/{id}', [Patient::class, 'delete'])->name('patient.delete');



