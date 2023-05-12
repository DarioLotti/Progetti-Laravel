<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//PUBBLIC CONTROLLER
Route::get('/',[PublicController::class,'homepage'] )->name('homepage');
Route::get('/category/{category}',[PublicController::class,'categoryShow'] )->name('categoryShow');
Route::get('/ricerca/annuncio',[PublicController::class,'searchAnnouncement'])->name('announcements.search');
Route::get('/lingua/{lang}',[PublicController::class,'setLanguage'])->name('setLocale');
Route::get('/user/profile', [PublicController::class, 'getUserProfile'])->name('user.profile');
Route::get('/aboutUs', [PublicController::class, 'aboutUs'])->name('chiSiamo');

//ANNOUNCEMENT CONTROLLER
Route::get('/new/announcement', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('create.announcement');
Route::get('/detail/{announcement}', [AnnouncementController::class,'show'])->name('announcement.detail');
Route::get('/all/announcement', [AnnouncementController::class,'indexAnnouncement'])->name('announcement.index');
Route::get('/announcement/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::delete('announcement/delete/{announcement}', [AnnouncementController::class, 'delete'])->name('announcement.delete');

//REVISOR CONTROLLER
Route::get('/revisor/home', [RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
Route::get('/richiesta/revisore',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi/revisore/{user}',[RevisorController::class,'makeRevisor'])->name('make.revisor');
Route::get('/revisor/undo', [RevisorController::class,'undo'])->name('revisor_undo');

//USER CONTROLLER
Route::get('/user/profile', [UserController::class, 'getUserProfile'])->name('user.profile');
Route::delete('/user/profile/delete', [UserController::class, 'deleteUserProfile'])->name('user.delete');

