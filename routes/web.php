<?php

use App\Http\Controllers\Admin\Agency\AgencyController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Contact\ContatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Feedback\FeedbackController;
use App\Http\Controllers\Admin\Group\GroupController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Province\ProvinceController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\ClientController;
use App\Models\Agency;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Post;
use App\Models\Province;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\App;

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

Route::prefix('/')->name('client.')->group(function () {
    Route::get("/", [ClientController::class, 'home'])->name('index');
    Route::get("/san-pham", [ClientController::class, 'products'])->name('products');
    Route::get("/san-pham/{slug}", [ClientController::class, 'productDetail'])->name('product-detail');
    Route::get("/tim-kiem", [ClientController::class, 'search'])->name('search');
    Route::get("/tin-tuc", [ClientController::class, 'blog'])->name('blog');
    Route::get("/tin-tuc/{slug}", [ClientController::class, 'blogDetail'])->name('blog-detail');
    Route::get("/lien-he", [ClientController::class, 'contactGet'])->name('contactGet');
});
Route::prefix('/cms')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, "dashboard"])->name('index');
    Route::prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [SliderController::class, 'update'])->name('update');
    });

        Route::prefix('/partners')->name('partners.')->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index');
        Route::get('/add', [PartnerController::class, 'add'])->name('add');
        Route::post('/add', [PartnerController::class, 'store'])->name('store');
        Route::get('/edit/{partner}', [PartnerController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [PartnerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PartnerController::class, 'delete'])->name('delete');
    });
    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/add', [categoryController::class, 'add'])->name('add');
        Route::post('/add', [categoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [categoryController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [categoryController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [categoryController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [categoryController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [categoryController::class, 'restore'])->name('restore');
    });
    Route::prefix('/posts')->name('post.')->group(function () {
        Route::get("/", [PostController::class, 'index'])->name('index');
        Route::get("/add", [PostController::class, 'add'])->name('add');
        Route::post('/add', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [PostController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [PostController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [PostController::class, 'restore'])->name('restore');
    });
    Route::prefix('/products')->name('product.')->group(function () {
        Route::get("/", [ProductController::class, 'index'])->name('index');
        Route::get("/add", [ProductController::class, 'add'])->name('add');
        Route::post('/add', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [ProductController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
    });




    Route::prefix('agencies')->name('agency.')->group(function () {
        Route::get("/", [AgencyController::class, 'index'])->name('index');
        Route::get("/add", [AgencyController::class, 'add'])->name('add');
        Route::post('/add', [AgencyController::class, 'store'])->name('store');
        Route::get('/edit/{agency}', [AgencyController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [AgencyController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [AgencyController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [AgencyController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [AgencyController::class, 'restore'])->name('restore');
    });
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/add', [UserController::class, 'add'])->name('add');
        Route::post('/add', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [UserController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [UserController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [UserController::class, 'restore'])->name('restore');
    });
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/account-setting', [UserController::class, 'AccountSetting'])->name('account-setting');
        Route::put('/account-setting/{id}', [UserController::class, 'accountSettingPost'])->name('account-setting-post');
        Route::get('/change-password', [UserController::class, 'changePw'])->name('change-password');
        Route::put('/change-password/{email}', [UserController::class, 'handleChangePassword'])->name('handle-change-password');
    });
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'updateSetting'])->name('updateSetting');
    });
    Route::get('/media', function () {
        return view('admin.media.index');
    })->name('media');
});
Route::prefix('/authenticate')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/forgot-password', [AuthController::class, 'ForgotPassword'])->name('ForgotPassword');
    Route::post('/forgot-password', [AuthController::class, 'SendMailForgotPassword'])->name('SendMailForgotPassword');
    Route::get('/forgot-password/reset', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/forgot-password/reset', [AuthController::class, 'PostResetPassword'])->name('PostResetPassword');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Routes dành cho các mẫu
require __DIR__ . '/template.php';
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
