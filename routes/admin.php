<?php
/**
 * Created by PhpStorm.
 * User: Saeed
 * Date: 7/4/2018
 * Time: 7:33 PM
 */
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    /*------Settings-----*/
    Route::resource('setting', 'SettingController');

    //Category
    Route::resource('category', 'CategoryController');
    Route::get('sub/category/{category}', 'CategoryController@subCategoryIndex')->name('sub-category-index');
    Route::post('store/sub/category/{category}', 'CategoryController@subCategoryStore')->name('sub-category-store');

    //Product
    Route::resource('product', 'ProductController');
    Route::resource('product_gallery', 'ProductGalleryController');
    Route::resource('product_table_list', 'ProductTableListController');
    Route::get('all/product/dtajax', 'ProductController@dtajax')->name('product.dtajax');

    /*------Sliders-----*/
    Route::resource('home-slider', 'SliderController');
    Route::get('slider-home-status/{id}', 'SliderController@status_chenge')->name('slider-home-status');

    /*------banners-----*/
    Route::resource('banners', 'BannerController');
    Route::get('banners-status/{id}', 'BannerController@status_chenge')->name('banners-status');

    /*------quick Links-----*/
    Route::resource('links', 'LinkController');

    /*------Page-----*/
    Route::resource('page', 'PageController');
    Route::post('page_gallery/store', 'PageController@galleryStore')->name('page.gallery.store');

    /*------Articles-----*/
    Route::resource('article', 'ArticleController');
    Route::post('article_gallery/store', 'ArticleController@galleryStore')->name('article.gallery.store');

    /*------News-----*/
    Route::resource('news', 'NewsController');
    Route::resource('newss', 'NewsController');
    Route::resource('news_gallery', 'NewsGalleryController');

    /*------ Gallery-----*/
    Route::resource('galleries', 'GalleryController');

    /*------ Media-----*/
    Route::resource('video', 'MediaController');

    /*------AboutUs-----*/
    Route::resource('about', 'AboutUsController');

    /*------Lfm File manager-----*/
    Route::get('file-manage', 'FileManagerController@index')->name('fime-manager');

    /*------Users-----*/
    Route::resource('users', 'UserController');
    Route::get('usersRole', 'UserController@userRole')->name('user.role.index');
    Route::post('users-role-detach/{user}/{role}', 'UserController@detachRole')->name('detach.role');
    Route::post('users-role-attach', 'UserController@attachRole')->name('attach.role');

    /*------comments-----*/
    Route::resource('comment', 'CommentController');

    /*------Gallery-----*/
    Route::resource('gallery', 'GalleryController');

    /*------ Partners-----*/
    Route::resource('partner', 'PartnerController');

    /*------ Certificate-----*/
    Route::resource('certificate', 'CertificateController');

    /*------ Downloads-----*/
    Route::resource('download', 'DownloadController');
});
