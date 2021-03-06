<?php

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Blog', 'prefix'=>'blog'],function (){
    Route::resource('posts','PostController')->names('blog.posts');
});

//Админка БЛОГА
$groupData =[
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];
Route::group($groupData, function (){
    //BlogCategory
    $methods =['index','edit','update','create','store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');

    // BlogPosts
    Route::resource('posts', 'PostController')
        ->except(['show']) //все методы кроме show
        ->names('blog.admin.posts');
});



//Route::resource('rest','RestTestController')->names('restTest');


// practice
Route::group(['namespace'=>'Practice', 'prefix'=>'/practice/images/'],function (){
    Route::get('/upload', 'ImageController@index')->name('practice.images');
    Route::post('/upload', 'ImageController@upload')->name('practice.images.upload');
    Route::get('/apis', 'ImageController@apis')->name('practice.apis.apis');
});

Route::group(['namespace'=>'Practice', 'prefix'=>'/practice/apis/'],function (){
    Route::get('/', 'ApisController@index')->name('practice.apis.index');
    Route::post('/', 'ApisController@show')->name('practice.apis.show');
});
