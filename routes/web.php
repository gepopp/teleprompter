<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::event-select')->name('home');
Route::livewire('/questions/{event}', 'teleprompt-questions')->name('questions');

require __DIR__.'/settings.php';
