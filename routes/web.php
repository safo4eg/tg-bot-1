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

//Route::get('/', function (Bot $telegram) {
//    $telegram->sendMessage(1454972838, 'Hello Nikita (Django) Vasukov');
//    $http = $telegram->sendDocument(1454972838, 'img.png');
//    dd($http->body());

//    $buttons = [
//        'inline_keyboard' => [
//            [
//                [
//                    'text' => 'button1',
//                    'callback_data' => '1'
//                ],
//            ],
//
//            [
//                [
//                    'text' => 'button2',
//                    'callback_data' => '2'
//                ],
//            ],
//        ]
//    ];
//
//    $telegram->sendMessageWithButtons(1454972838, 'Выберите кнопку', json_encode($buttons));
//});

Route::name('auth.')->group(function () {
    Route::match(['GET', 'POST'], '/register', \App\Http\Controllers\Auth\Registration::class)->name('register')
        ->middleware('guest');
    Route::match(['GET', 'POST'], '/login', \App\Http\Controllers\Auth\Login::class)->name('login')
        ->middleware('guest');;
    Route::get('/logout', \App\Http\Controllers\Auth\Logout::class)->name('logout')
        ->middleware('auth');;
});

Route::get('/', function () {
    return redirect()->route('auth.login');
});

Route::resource('posts', \App\Http\Controllers\Posts::class)->middleware('auth');

