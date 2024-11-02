<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [QuizController::class, 'home'])->name('home');
Route::get('/quiz/mode/{language}', [QuizController::class, 'selectMode'])->name('selectMode');
Route::get('/quiz/{language}/{mode}', [QuizController::class, 'showQuiz'])->name('showQuiz');
Route::get('/review', [QuizController::class, 'review'])->name('review');
