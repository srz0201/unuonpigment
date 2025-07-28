<?php

use App\Http\Controllers\Auth\MobileVerificationController;
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

require __DIR__.'/auth.php';


//sitemaps
Route::get('sitemap','SitemapController@index')->name('sitemap');
Route::get('sitemap/products','SitemapController@products')->name('sitemap.products');
Route::get('sitemap/pages','SitemapController@pages')->name('sitemap.pages');
Route::get('sitemap/category','SitemapController@category')->name('sitemap.category');
Route::get('sitemap/articles','SitemapController@articles')->name('sitemap.articles');






Route::post('/mobile/register', [MobileVerificationController::class, 'register'])->name('mobile.verify.register');
Route::get('/mobile/get/verify/{mobile}', [MobileVerificationController::class, 'getVerify'])->name('mobile.get.verify');
Route::post('/mobile/verify', [MobileVerificationController::class,'verify'])->name('mobile.verify');
Route::get('/register/verify/{code}', [MobileVerificationController::class,'registerVerify'])->name('register.verify');


Route::get('/', 'HomeController@index')->name('home');
//Search
Route::get('{lang}/search','ProductController@search')->name('search');

//Route::get('/{lang}','HomeController@index')->name('home');


Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('products/{slug}', 'ProductController@index')->name('product.index');
Route::get('product/{slug}', 'ProductController@single')->name('product.single');
Route::post('/product/comment/{product}/store','ProductController@comment')->name('product.comment.store');

//Article
Route::get('articles','ArticleController@index')->name('articles');
Route::get('articles/{slug}','ArticleController@single')->name('article');
Route::post('/articles/comment/{article}/store','ArticleController@storeComment')->name('article.comment.store');

//News
Route::get('/{lang}/news','NewsController@index')->name('Newss');
Route::get('news/{slug}','NewsController@single')->name('News');
Route::post('/news/comment/{news}/store','NewsController@storeComment')->name('news.comment.store');

//gallery
Route::get('{lang}/gallery/','GalleryController@index')->name('gallery');
//media
Route::get('{lang}/media/','MediaController@index')->name('media');

//About_us
Route::get('about-us','AboutUsController@index')->name('about-us');

//Contact_us
Route::get('contact_us','ContactUsController@index')->name('contact-us');
Route::post('contact_us/store','ContactUsController@store')->name('contact-us.store');

//Language Change
Route::get('/language/change/{lang}','LanguageController@change')->name('language.change');


Route::get('/{lang}/services','PageController@index')->name('pages');
Route::get('service/{slug}','PageController@single')->name('Page');
Route::post('/service/comment/{page}/store','PageController@storeComment')->name('page.comment.store');

Route::get('/{lang}/certificates' ,'CertificatesController')->name('certificates');




