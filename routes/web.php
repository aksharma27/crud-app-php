<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadImageController;


// insert and upload image on server 
Route::get('/insertForm',[UploadImageController::class,'insertForm'])->name('uploadImage.insertFrom');
Route::post('/uploadImage',[UploadImageController::class,'uploadImage'])->name('uploadImage.upload');

// Display all images from Database and Server 
Route::get('/',[UploadImageController::class,'display'])->name('uploadImage.display');


// Delete uploaded Image on Server and Database 
Route::get('/uploadImage/delete/{id}',[UploadImageController::class,'ImageDelete'])->name('uploadImage.delete');


// Update Image 
Route::get('/uploadImage/edit/{id}',[UploadImageController::class,'ImageEdit'])->name('uploadImage.edit');
Route::post('/uploadImage/update',[UploadImageController::class,'ImageUpdate'])->name('uploadImage.update');