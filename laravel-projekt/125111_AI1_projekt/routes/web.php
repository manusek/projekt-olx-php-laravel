<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdvertisementController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/', [CategoryController::class, 'index'])->name('welcome');

//widok formularza do dodawania ogloszen
Route::get('/formularz', [FormController::class, 'index'])->name('add.adv');

//wysylanie ogloszen
Route::post('/formularz', [FormController::class, 'store']);

//widok ogloszen z danej kategorii
Route::get('/category/{category_id}/ads', [CategoryController::class, 'showAds'])->name('category.ads');

//widok ogloszen danego uzytkownika
Route::get('/moje_ogloszenia', [AdvertisementController::class, 'myAdvertisements'])->name('my_advs')->middleware('auth');

//usuwanie ogloszenia
Route::get('/usun/{id}', [AdvertisementController::class, 'deleteAdv'])->name('ogloszenia.usun');

//edycja ogloszenia
Route::get('/edytuj/{id}', [AdvertisementController::class, 'editAdv'])->name('ogloszenia.edycja');

//aktualizacja edytowanego ogloszenia
Route::put('/aktualizuj/{id}', [AdvertisementController::class, 'updateAdv'])->name('ogloszenia.aktualizuj');

//wyszukiwanie ogloszen
Route::get('/search', [AdvertisementController::class, 'search'])->name('search');


//tworzenie kategorii
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

//usuwanie kategorii
Route::delete('/categoriesdel/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');

//edytowanie kategorii
Route::get('/categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');


//regulamin
Route::get('/terms', function () {  
    return view('terms');
});

//pomoc techniczna
Route::get('/support', function () {
    return view('support');
});

//polityka prywatnosci
Route::get('/privacy', function () {
    return view('privacy');
});





