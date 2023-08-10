<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\CommentController;
use App\Models\Category;
use Illuminate\Routing\Router;
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

//route admin
Route::get('register', [AdminController::class, 'register']);
Route::post('register', [AdminController::class, 'postregister']);
Route::get('login', [AdminController::class, 'login']);
Route::post('login', [AdminController::class, 'postlogin']);
Route::get('logout', [AdminController::class, 'logout']);

//route menu admin
Route::middleware('checkAdmin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'insert']);
            Route::get('edit/{id}', [CategoryController::class, 'edit']);
            Route::post('edit/{id}', [CategoryController::class, 'update']);
            Route::get('delete/{id}', [CategoryController::class, 'delete']);
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostsController::class, 'index']);
            Route::get('create', [PostsController::class, 'create']);
            Route::post('create', [PostsController::class, 'insert']);
            Route::get('edit/{id}', [PostsController::class, 'edit']);
            Route::post('edit/{id}', [PostsController::class, 'update']);
            Route::get('delete/{id}', [PostsController::class, 'delete']);
        });

        Route::prefix('sliders')->group(function () {
            Route::get('/', [SlidersController::class, 'index']);
            Route::get('create', [SlidersController::class, 'create']);
            Route::post('create', [SlidersController::class, 'insert']);
            Route::get('edit/{id}', [SlidersController::class, 'edit']);
            Route::post('edit/{id}', [SlidersController::class, 'update']);
            Route::get('delete/{id}', [SlidersController::class, 'delete']);
        });

        Route::prefix('mainmenu')->group(function () {
            Route::get('/', [MainMenuController::class, 'index']);
            Route::get('create', [MainMenuController::class, 'create']);
            Route::post('create', [MainMenuController::class, 'insert']);
            Route::get('edit/{id}', [MainMenuController::class, 'edit']);
            Route::post('edit/{id}', [MainMenuController::class, 'update']);
            Route::get('delete/{id}', [MainMenuController::class, 'delete']);
        });

        Route::get('/message', [MessageController::class, 'index']);

        Route::prefix('profile')->group(function () {
            Route::get('{id}', [AdminController::class, 'edit']);
            Route::post('{id}', [AdminController::class, 'update']);
        });
    });
});

// Route Portal
Route::get('/',[PortalController::class,'index']);
Route::get('about',[PortalController::class,'about']);
Route::get('contact',[PortalController::class,'contact']);
Route::get('post',[PortalController::class,'post']);
Route::get('post-detail/{id}',[PortalController::class,'postDetail']);
Route::get('menu/{id}',[PortalController::class,'menu']);
Route::get('category/{id}',[PortalController::class,'category']);
Route::get('search',[PortalController::class,'search']);

Route::prefix('comment')->group(function()
{
    Route::get('/',[CommentController::class,'insert']);
    Route::post('/',[CommentController::class,'insert']);
});

Route::prefix('contact')->group(function()
{
    Route::post('/',[MessageController::class,'insert']);
});