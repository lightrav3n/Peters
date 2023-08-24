<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::group(['middleware' =>'language'], function (){
    Route::get('/', function (){
        return redirect()->route('site.index', \Illuminate\Support\Facades\Session::get('language'));
    });

    Route::get('selectLanguage/{id}',[\App\Http\Controllers\SiteController::class, 'selectLanguage']);

    Route::group(['prefix' => '{language}', 'where' => ['language' => '[a-zA-Z]{2}']], function () {
        Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('site.index');

        Route::get('about-us', [\App\Http\Controllers\SiteController::class, 'aboutUs'])->name('site.about');

        Route::get('contact', function (){
            return view('contact');
        })->name('site.contact');

        Route::post('contactFormSend', [\App\Http\Controllers\SiteController::class, 'contactFormSend'])->name('site.contact.send');

        Route::prefix('products')->group(function () {
            Route::get('', [\App\Http\Controllers\ProductController::class, 'index'])->name('site.products.index');
            Route::get('/{slug}',[\App\Http\Controllers\ProductController::class, 'products'])->name('site.products');
            Route::get('show/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('site.product.show');
        });
        Route::get('productConfigurator/{slug?}', [\App\Http\Controllers\SiteController::class, 'productConfigurator'])->name('site.product.configurator');

        Route::prefix('news')->group(function () {
            Route::get('', [\App\Http\Controllers\NewsController::class, 'index'])->name('site.news.index');
            Route::get('/{slug}', [\App\Http\Controllers\NewsController::class, 'articleRead'])->name('site.news.read');
        });

        Route::get('downloads', [\App\Http\Controllers\SiteController::class, 'downloads'])->name('site.downloads');

        Route::get('site-notice', [\App\Http\Controllers\SiteController::class, 'sitePolicy'])->name('site.notice.policy');
        Route::get('cookie-policy', [\App\Http\Controllers\SiteController::class, 'cookiePolicy'])->name('site.cookie.policy');
        Route::get('privacy-policy', [\App\Http\Controllers\SiteController::class, 'privacyPolicy'])->name('site.privacy.policy');
    });
});

Route::post('addToConfig/{product}', [\App\Http\Controllers\SiteController::class, 'addToConfig'])->name('site.build.product.config');
Route::get('clearConfig',[\App\Http\Controllers\SiteController::class, 'clearConfig'])->name('site.build.clear');
Route::post('orderFinish',[\App\Http\Controllers\SiteController::class, 'orderfinish'])->name('site.order.finish');
Route::post('orderOffer/{product}',[\App\Http\Controllers\SiteController::class, 'orderOffer'])->name('site.order.offer');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::prefix('AdminDashboard')->group(function () {
        Route::get('index', [\App\Http\Controllers\cms\AdminDashboardController::class, 'index'])->name('cms.index');

        Route::resource('Products',\App\Http\Controllers\cms\ProductController::class);
        Route::post('deleteProductGalleryMedia', [\App\Http\Controllers\cms\ProductController::class, 'deleteGalleryMedia'])->name('Products.deleteGalleryMedia');
        Route::post('Products.toHome/{product}', [\App\Http\Controllers\cms\ProductController::class, 'toHome'])->name('Products.toHome');
        Route::post('CategoryAdd',[\App\Http\Controllers\cms\ProductController::class, 'CategoryAdd'])->name('Products.category.add');
        Route::post('CategoryUpdate/{category}',[\App\Http\Controllers\cms\ProductController::class, 'CategoryUpdate'])->name('Products.category.update');
        Route::post('CategoryOrder', [\App\Http\Controllers\cms\ProductController::class, 'CategoryOrder'])->name('Products.category.order');
        Route::post('deleteCategory', [\App\Http\Controllers\cms\ProductController::class, 'deleteCategory'])->name('Products.category.delete');
        Route::get('ProductDescriptionsCreate/{product}', [\App\Http\Controllers\cms\ProductController::class, 'productDescriptionsCreate'])->name('Products.descriptions.create');
        Route::post('ProductDescriptionStore/{product}', [\App\Http\Controllers\cms\ProductController::class, 'productDescriptionStore'])->name('Products.descriptions.store');
        Route::get('relatedProducts', [\App\Http\Controllers\cms\ProductController::class, 'relatedIndex'])->name('Products.related.index');
        Route::get('relatedProductsEdit/{product}', [\App\Http\Controllers\cms\ProductController::class, 'relatedEdit'])->name('Products.related.edit');
        Route::post('/{product}/attachProduct/{related}', [\App\Http\Controllers\cms\ProductController::class, 'attachRelated'])->name('Products.related.attach');
        Route::post('/{product}/detachProduct/{related}', [\App\Http\Controllers\cms\ProductController::class, 'detachRelated'])->name('Products.related.detach');

        Route::get('Orders', [\App\Http\Controllers\cms\OrderController::class, 'index'])->name('cms.orders.index');
        Route::get('OrderDetails/{id}', [\App\Http\Controllers\cms\OrderController::class, 'details'])->name('cms.orders.details');
        Route::delete('Order/{order}', [\App\Http\Controllers\cms\OrderController::class, 'destroy'])->name('cms.orders.destroy');

        Route::resource('News', \App\Http\Controllers\cms\NewsController::class);
        Route::post('NewsMediaOrder', [\App\Http\Controllers\cms\NewsController::class, 'MediaOrder'])->name('News.mediaOrder');
        Route::post('deleteNewsGalleryMedia', [\App\Http\Controllers\cms\NewsController::class, 'deleteGalleryMedia'])->name('News.deleteGalleryMedia');
        Route::post('NewsCategoryAdd',[\App\Http\Controllers\cms\NewsController::class, 'CategoryAdd'])->name('News.category.add');
        Route::post('NewsCategoryOrder', [\App\Http\Controllers\cms\NewsController::class, 'CategoryOrder'])->name('News.category.order');
        Route::post('NewsdeleteCategory', [\App\Http\Controllers\cms\NewsController::class, 'deleteCategory'])->name('News.category.delete');
        Route::get('NewsDuplicate/{news}', [\App\Http\Controllers\cms\NewsController::class, 'duplicatePost'])->name('News.duplicate');
        Route::post('NewsDuplicatePost/{news}', [\App\Http\Controllers\cms\NewsController::class, 'duplicatePostStore'])->name('News.duplicate.store');

        Route::resource('Testimonials',\App\Http\Controllers\cms\TestimonialController::class);

        Route::resource('Partners',\App\Http\Controllers\cms\PartnerController::class);

        Route::resource('Team', \App\Http\Controllers\cms\TeamController::class);
        Route::resource('Download', \App\Http\Controllers\cms\DownloadController::class);

        Route::get('SiteNotice',[\App\Http\Controllers\cms\AdminDashboardController::class, 'noticePage'])->name('cms.notice.index');
        Route::post('SiteNotice',[\App\Http\Controllers\cms\AdminDashboardController::class, 'noticePageUpdate'])->name('cms.notice.update');

        Route::get('CookiePolicy',[\App\Http\Controllers\cms\AdminDashboardController::class, 'cookiePage'])->name('cms.cookie.index');
        Route::post('CookiePolicy',[\App\Http\Controllers\cms\AdminDashboardController::class, 'cookiePageUpdate'])->name('cms.cookie.update');

        Route::get('PrivacyPolicy',[\App\Http\Controllers\cms\AdminDashboardController::class, 'privacyPage'])->name('cms.privacy.index');
        Route::post('PrivacyPolicy',[\App\Http\Controllers\cms\AdminDashboardController::class, 'privacyPageUpdate'])->name('cms.privacy.update');

        Route::get('HomePage', [\App\Http\Controllers\cms\HomePageController::class, 'index'])->name('cms.homepage.index');
        Route::post('HomepageHlUpdate', [\App\Http\Controllers\cms\HomePageController::class, 'homepageHlUpdate'])->name('cms.homepagehl.update');

        Route::get('ProductCards', [\App\Http\Controllers\cms\HomePageController::class, 'productCards'])->name('cms.homepage.productcards');
        Route::patch('ProductCardsUpdate/{card}', [\App\Http\Controllers\cms\HomePageController::class, 'productCardsUpdate'])->name('cms.homepage.productcards.update');

        Route::get('ProductCards2', [\App\Http\Controllers\cms\HomePageController::class, 'productCards2'])->name('cms.homepage.productcards2');
        Route::patch('ProductCards2Update/{card}', [\App\Http\Controllers\cms\HomePageController::class, 'productCards2Update'])->name('cms.homepage.productcards2.update');

        Route::post('HomepageExpertiseUpdate', [\App\Http\Controllers\cms\HomePageController::class, 'homepageExpertiseUpdate'])->name('cms.homepage.expertise.update');

        Route::get('AboutUs', [\App\Http\Controllers\cms\AboutPageController::class, 'index'])->name('cms.about.index');
        Route::post('AboutHlUpdate', [\App\Http\Controllers\cms\AboutPageController::class, 'aboutHlUpdate'])->name('cms.about.update');
        Route::post('CompanyProfileUpdate', [\App\Http\Controllers\cms\AboutPageController::class, 'companyProfileUpdate'])->name('cms.company.update');

        Route::get('ProductLp', [\App\Http\Controllers\cms\ProductLpController::class, 'index'])->name('cms.productlp.index');
        Route::patch('ProductLp/{card}', [\App\Http\Controllers\cms\ProductLpController::class, 'lpCards'])->name('cms.productlp.update');

        Route::middleware(['role:Super Admin'])->group(function (){
            Route::get('Settings',[\App\Http\Controllers\cms\AdminDashboardController::class, 'settings'])->name('cms.settings');
            Route::post('Settings',[\App\Http\Controllers\cms\AdminDashboardController::class, 'settingsUpdate'])->name('cms.settings.update');
            Route::post('addLanguage', [\App\Http\Controllers\cms\AdminDashboardController::class, 'addLanguage'])->name('cms.language.create');

            Route::resource('Users', \App\Http\Controllers\cms\UserController::class, ['as' => 'cms']);
            Route::get('Roles',[\App\Http\Controllers\cms\UserController::class, 'rolesIndex'])->name('cms.users.roles');
            Route::post('Roles',[\App\Http\Controllers\cms\UserController::class, 'rolesStore'])->name('cms.users.roles.store');
            Route::post('userDelete/{User}',[\App\Http\Controllers\cms\UserController::class, 'userDelete'])->name('cms.user.delete');
        });

    });
});

Route::get('PetersAdmin', function (){
    return redirect()->route('cms.index');
})->name('cms.admin');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
