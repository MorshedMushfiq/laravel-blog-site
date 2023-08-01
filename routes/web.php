<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// get route for frontend main page
Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('home.index');



// get route for create post page
Route::get('create_new_post', [App\Http\Controllers\BlogController::class, 'addPost'])->name('create.post');

// get route for manage post page
Route::get('manage_your_all_posts', [App\Http\Controllers\BlogController::class, 'managePost'])->name('manage.post');

// post route for create a post
Route::post('admin/create_new_post/store', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');

// get route for edit post page
Route::get('manage_your_all_posts/edit_your_post/{id}', [App\Http\Controllers\BlogController::class, 'editPost'])->name('post.edit');

// post route for edit the data and update the post
Route::post('/update/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('post.update');

// get route for trash page
Route::get('/trash_posts', [App\Http\Controllers\BlogController::class, 'gotrash'])->name('post.trash');

// get route for trash with id page
Route::get('/trash/{id}', [App\Http\Controllers\BlogController::class, 'trash'])->name('blog.trash');

// get route for restore data from trash page
Route::get('/restore/{id}', [App\Http\Controllers\BlogController::class, 'restore'])->name('blog.restore');

// get route for force delete to the trash page data
Route::get('/forceDelete/{id}', [App\Http\Controllers\BlogController::class, 'forceDelete'])->name('force.delete');

// get route for frontend blog page
Route::get("/blog", [App\Http\Controllers\BlogController::class, 'blogpage'])->name('blog.page');

// get route for frontend single blog page
Route::get("/blog/single_blog/{id}", [App\Http\Controllers\BlogController::class, 'singleblog'])->name('blog.single');


// post route for search
Route::post("/search", [App\Http\Controllers\BlogController::class, 'search'])->name('search.post');

// post route for frontend search
Route::post("/home/search", [App\Http\Controllers\BlogController::class, 'searchPostInHome'])->name('search.homepost');




// get route for logged out page
Route::get('logging_out',[App\Http\Controllers\BlogController::class, "logout"])->name('logout.dashboard');







// post route for loging your account 

    Route::post('logging_your_account',[App\Http\Controllers\BlogController::class, "loginAccount"])->name('login.account');


// get route for register page
    Route::get('register', [App\Http\Controllers\BlogController::class, 'register'])->name('register.dashboard');

    // post route for register
    Route::post('register_your_account',[App\Http\Controllers\BlogController::class, "registerAccount"])->name('register.account');
    


//group get route for dashboard page
    Route::group(["middleware"=>"admin"], function(){
        Route::get("/dashboard",[App\Http\Controllers\BlogController::class, 'dashboard'])->name('blog.dashboard');
    });

    //group get route for login page

    Route::group(['middleware'=>'redirectifauthenticated'], function(){
        Route::get('login', [App\Http\Controllers\BlogController::class, 'login'])->name('login.dashboard');
    });