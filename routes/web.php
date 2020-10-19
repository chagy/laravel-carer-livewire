<?php

use App\Http\Livewire\Position;
use App\Http\Livewire\Department;
use App\Http\Livewire\CategoryCarer;
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
});

Route::get('/position',Position::class)->name("position");
Route::get('/department',Department::class)->name("department");
Route::get('/category-carer',CategoryCarer::class)->name("category.carer");
