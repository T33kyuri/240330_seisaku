<?php
// routes/web.php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController; //追加
use App\Http\Controllers\TeamController; //追加
use App\Models\Book; //追加

use App\Http\Controllers\EvaluationController; //追加
use App\Models\Evaluation; //追加

use App\Models\Admin; //追加
use App\Http\Controllers\Admin\Auth\LoginController; //追加

use App\Http\Controllers\InreceiptController; //追加

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


// ログイン画面を表示するルート
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
// ログイン処理を行うルート
Route::post('/admin/login', [LoginController::class, 'login']);
// ログアウト処理を行うルート
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');



// ログイン成功時のリダイレクト先を設定
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [LoginController::class, 'index'])->name('admin.dashboard')->middleware(['auth']);
});
    //sがない？
    Route::post('/admin/dashboard', [LoginController::class, 'store'])->middleware(['auth']);
    // Route::get('/admin/dashboard/get-users', 'UserController@getUsersByCompany');
    // 検索処理
    Route::post('/admin/dashboard/search', [LoginController::class, 'search'])->middleware(['auth']);




//本：ダッシュボード表示(books.blade.php)
// Route::get('/', [BookController::class,'index'])->middleware(['auth']);
// //本：追加 
// Route::post('/books',[BookController::class,"store"]);
// //本：削除 
// Route::delete('/book/{book}', [BookController::class,"destroy"]);
// //本：更新画面表示
// Route::post('/booksedit/{book}',[BookController::class,"edit"]); //通常
// //本：更新処理
// Route::post('/books/update',[BookController::class,"update"]);

// //チーム一覧表示（管理画面）
// Route::get('teams', [TeamController::class, 'index'])->middleware(['auth']);
// //チーム登録処理
// Route::post('teamadd', [TeamController::class, 'store']);
// //チーム所属処理
// Route::get('team/{team_id}', [TeamController::class, 'join']);



//受領側：ダッシュボード表示(Evaluations.blade.php)
Route::get('/', [InreceiptController::class,'index'])->middleware(['auth']);
//評価：更新画面表示
Route::post('/inreceiptsheet/{evaluation}',[InreceiptController::class,"edit"]); //通常
//評価：更新処理
// Route::get('/inreceiptsheet/update',[InreceiptController::class,"update"]);
// Route::post('/inreceiptsheet/update',[InreceiptController::class,"update"]);
//評価：評価を確定
Route::post('/inreceiptconfirm/{evaluation}',[InreceiptController::class,"receipt"]);



//評価：ダッシュボード表示(Evaluations.blade.php)
Route::get('/eva', [EvaluationController::class,'eva'])->middleware(['auth']);


// Route::get('/evaluations', [EvaluationController::class,'eva'])->middleware(['auth']);
//評価：追加 
Route::post('/evaluations',[EvaluationController::class,"store"]);

//評価：削除 
Route::delete('/evaluation/{evaluation}', [EvaluationController::class,"destroy"]);

//評価：更新画面表示
Route::post('/evaluationsedit/{evaluation}',[EvaluationController::class,"edit"]); //通常

//評価：更新処理
Route::post('/evaluations/update',[EvaluationController::class,"update"]);

//評価：評価を確定
Route::post('/evaluationsconfirm/{evaluation}',[EvaluationController::class,"send"]);




//*****ここから下はデフォルトで入ってます*****

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
