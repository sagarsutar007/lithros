<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OpeningController;
use App\Http\Controllers\SliderController;


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

Route::get('/', [WebController::class, 'index'])->name('main');
Route::get('/about/company', [WebController::class, 'company'])->name('web.company');
Route::get('/about/legals', [WebController::class, 'legals'])->name('web.legals');
Route::get('/about/gallery', [WebController::class, 'gallery'])->name('web.gallery');
Route::get('/about/csr', [WebController::class, 'csr'])->name('web.csr');
Route::get('/services/recharging', [WebController::class, 'recharging'])->name('web.recharge');
Route::get('/services/recycling', [WebController::class, 'recycling'])->name('web.recycle');
Route::get('/request-quote', [WebController::class, 'requestQuote'])->name('web.requote');
Route::get('/products', [WebController::class, 'products'])->name('web.products');
Route::get('/product/{slug}', [WebController::class, 'showBySlug'])->name('products.show');
Route::get('/careers', [WebController::class, 'openings'])->name('web.openings');
Route::get('/contact-us', [WebController::class, 'contact'])->name('web.contact');
Route::get('/admin', [WebController::class, 'admin'])->name('web.admin');
Route::get('/products/{categorySlug}', [WebController::class, 'productsByCategory'])->name('web.products.by_category');
Route::get('/products/{categorySlug}/{productSlug}', [WebController::class, 'showProductBySlug'])->name('web.products.show_by_slug');



Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');


// Route::get('/admin', [BackendController::class, 'index']->)name('backend.index');

// Route::get('/admin', function() {
//     return view('backend.index');
// });

Route::middleware(['auth'])->group(function () {

    // Sliders Routes
    Route::prefix('/app/sliders')->group(function () {
        Route::get('', [SliderController::class, 'index'])->name('sliders');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/{slider}/update', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
        Route::delete('/images/{image}', [SliderController::class, 'deleteImage'])->name('image.delete');
        Route::get('/category/{categorySlug}', [ProductController::class, 'showProductsByCategory'])->name('products.by_category');


    });


    // Category Routes
    Route::prefix('/app/categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/save', [CategoryController::class, 'save'])->name('category.save');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::post('/search', [CategoryController::class, 'search'])->name('category.search');
    });


    // Products Routes
    Route::prefix('/app/products')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('products');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/{product}/update', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::delete('/images/{image}', [ProductController::class, 'deleteImage'])->name('image.delete');

    });

    // Job Openings Routes
    Route::prefix('/app/openings')->group(function () {
        Route::get('/', [OpeningController::class, 'index'])->name('openings');
        Route::get('/create', [OpeningController::class, 'create'])->name('openings.create');
        Route::post('/store', [OpeningController::class, 'store'])->name('openings.store');
        Route::get('/openings/{slug}/edit', [OpeningController::class, 'edit'])->name('openings.edit');
        Route::get('/{opening}/edit', [OpeningController::class, 'edit'])->name('openings.edit');
        Route::post('/openings/{slug}/update', [OpeningController::class, 'update'])->name('openings.update');
        Route::delete('/{opening}', [OpeningController::class, 'destroy'])->name('openings.destroy');
        Route::post('/search', [OpeningController::class, 'search'])->name('openings.search');
        Route::get('/list-job', [OpeningController::class, 'listJob'])->name('openings.list-job');

    });

    // Applciants Routes
    Route::prefix('/app/applicants')->group(function () {
        Route::get('/', [ApplicantController::class, 'index'])->name('applicants');
        Route::get('/create', [ApplicantController::class, 'create'])->name('applicants.create');
        Route::post('/store', [ApplicantController::class, 'store'])->name('applicants.store');
        Route::post('/save', [ApplicantController::class, 'save'])->name('applicants.save');
        Route::get('/{applicant}/edit', [ApplicantController::class, 'edit'])->name('applicants.edit');
        Route::post('/{applicant}/update', [ApplicantController::class, 'update'])->name('applicants.update');
        Route::delete('{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');
        Route::post('/search', [ApplicantController::class, 'search'])->name('applicants.search');
    });

        
    // Feedbacks Routes
    Route::prefix('/app/feedbacks')->group(function () {
        Route::get('', [FeedbackController::class, 'index'])->name('feedbacks');
        Route::get('/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
        Route::post('/store', [FeedbackController::class, 'store'])->name('feedbacks.store');
        Route::post('/save', [FeedbackController::class, 'save'])->name('feedbacks.save');
        Route::get('/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
        Route::post('/{feedback}/update', [FeedbackController::class, 'update'])->name('feedbacks.update');
        Route::delete('/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
        Route::post('/search', [FeedbackController::class, 'search'])->name('feedbacks.search');
    });
});



