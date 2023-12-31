<?php

use App\Http\Controllers\Covid19Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDetailController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Barryvdh\DomPDF\Facade\Pdf;
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

Route::get('/page1', function () {
    return "<h1>This is page 1 !!!</h1>";
});

Route::get('/page2', function () {
    return "<h1>This is page 2 !!!</h1>";
});

Route::get('/bootstrap', function () {
    return view('bootstrap');
});

Route::get("/homepage", function () {
    return "<h1>This is home page</h1>";
});

Route::get("/blog/{id}", function ($id) {
    return "<h1>This is blog page : {$id} </h1>";
});

Route::get("/blog/{id}/edit", function ($id) {
    return "<h1>This is blog page : {$id} for edit</h1>";
});

Route::get("/product/{a}/{b}/{c}", function ($a, $b, $c) {
    return "<h1>This is product page </h1><div> {$a}, {$b}, {$c}</div>";
});

Route::get("/category/{a?}", function ($a = "mobile") {
    return "<h1>This is category page : {$a}</h1>";
});

Route::get("/myorder/create", function () {
    return "<h1>This is order form " . request("id") . " page : " . request("username") . "</h1>";
});

Route::get("/hello", function () {
    return view("hello");
});

Route::get("/good_route", function () {
    return view("test/index");
});

Route::get("/greeting", function () {

    $name = 'James';
    $last_name = 'Mars';

    return view('greeting', compact('name', 'last_name'));
});

Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});

Route::get("/teacher", function () {
    return view("teacher");
});

Route::get("/student", function () {
    return view("student");
});

Route::get("/theme", function () {
    return view("theme");
});

// Route Template Inheritance
Route::get("/teacher/inheritance", function () {
    return view("teacher-inheritance");
});
Route::get("/student/inheritance", function () {
    return view("student-inheritance");
});

// Route Template Component
Route::get("/teacher/component", function () {
    return view("teacher-component");
});
Route::get("/student/component", function () {
    return view("student-component");
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get("/myprofile/create", [MyProfileController::class, "create"]);
Route::get("/myprofile/{id}/edit", [MyProfileController::class, "edit"]);
Route::get("/myprofile/{id}", [MyProfileController::class, "show"]);
Route::get("/coronavirus", [MyProfileController::class, "coronavirus"]);

Route::get("/newgallery", [MyProfileController::class, "gallery"]);
Route::get("/newgallery/ant", [MyProfileController::class, "ant"]);
Route::get("/newgallery/bird", [MyProfileController::class, "bird"]);

Route::get('/covid19', [Covid19Controller::class, "index"]);

// Route::get("/product", [ProductController::class, "index"])->name('product.index');
// Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
// Route::post("/product", [ProductController::class, "store"])->name('product.store');
// Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
// Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
// Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
// Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

Route::resource('/product', ProductController::class);

// Route::get("/staff", [StaffController::class, "index"])->name('staff.index');
// Route::get("/staff/create", [StaffController::class, "create"])->name('staff.create');
// Route::post("/staff", [StaffController::class, "store"])->name('staff.store');
// Route::get('/staff/{id}', [StaffController::class, "show"])->name('staff.show');
// Route::get("/staff/{id}/edit", [StaffController::class, "edit"])->name('staff.edit');
// Route::patch("/staff/{id}", [StaffController::class, "update"])->name('staff.update');
// Route::delete("/staff/{id}", [StaffController::class, "destroy"])->name('staff.destroy');

Route::resource('/staff', StaffController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::resource('post', 'PostController');
Route::resource('post', PostController::class);

Route::resource('profile', ProfileController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);

Route::resource('customer', 'CustomerController');
Route::resource('quotation', 'QuotationController');
Route::resource('quotation-detail', 'QuotationDetailController');

Route::middleware(['auth'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::get('quotation/{id}/pdf', [QuotationController::class, 'pdf']);
    Route::resource('quotation', QuotationController::class);
    Route::resource('quotation-detail', QuotationDetailController::class);
});

Route::get('/test/pdf', function(){
    $a = "hello";
    $b = "world";
    $c = "ทดสอบภาษาไทย";
    $pdf = Pdf::loadView('testpdf', compact('a','b','c'));
    return $pdf->stream();
});

// Route::resource('leave-request', 'LeaveRequestController');
// Route::resource('leave-type', 'LeaveTypeController');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,guest'])->group(function () {
        Route::resource('leave-request', LeaveRequestController::class)->except(['edit','update']);
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('leave-request', LeaveRequestController::class)->only(['edit','update']);
        Route::resource('leave-type', LeaveTypeController::class);
        Route::get("dashboard-leave", function () {
            return view("dashboard-leave");
        });
    });
});
