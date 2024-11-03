<?php

use Illuminate\Support\Facades\Route;

/*** Front-end Route Start
*** All Front-end Route Here ***
***/
// Route For Home Page
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

// Route For About Page
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');

// Route For Service Page
Route::get('/service', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('service');

// Route For Blog Page
Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog');
Route::get('/blog/blog-details/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'singleBlog'])->name('single-blog');
Route::post('/blog/form-submission', [App\Http\Controllers\Frontend\BlogController::class, 'formSubmit'])->name('form.submit');

// Route Fro Pricing Page
Route::get('/pricing', [App\Http\Controllers\Frontend\PricingController::class, 'index'])->name('pricing');

// Route For Contact Page
Route::get('/contact-us', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::post('/form-submission', [App\Http\Controllers\Frontend\ContactController::class, 'submitForm'])->name('contact.submit');

// Route For FAQ Page
Route::get('/freequenly-asked-question', [App\Http\Controllers\Frontend\FaqController::class, 'index'])->name('faq');

// Route For Terms & Cond Page
Route::get('/terms-and-condition', [App\Http\Controllers\Frontend\TermsController::class, 'index'])->name('terms');

/*** Back-end Route Start
*** All Back-end Route Here ***
***/
Route::prefix('administrator')->group(function (){

    // Redirect from /administrator to /administrator/login
	Route::get('/', function () {
		return redirect()->route('login');
	});

    // Route for Admin Login Form
	Route::get('/login', [App\Http\Controllers\Backend\UserController::class, 'showForm'])->name('login');
	Route::post('/login-processing', [App\Http\Controllers\Backend\UserController::class, 'login'])->name('login.submit');
	Route::post('/logout', [App\Http\Controllers\Backend\UserController::class, 'logout'])->name('logout');

    // All routes below are protected by auth middleware
	Route::middleware('auth')->group(function () {
        // Route for Admin Dashboard
		Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

        // Banner Controller Routes
		Route::resource('/banner', App\Http\Controllers\Backend\BannerController::class);
		
        // Route for About 
		Route::resource('/about', App\Http\Controllers\Backend\AboutController::class);
		
        // Route for Team Member 
		Route::resource('/team-member', App\Http\Controllers\Backend\TeamController::class);
		
        // Route for Client Feedback 
		Route::resource('/feedback', App\Http\Controllers\Backend\FeedBackController::class);
		
        // Route for Blog Category
		Route::resource('/category', App\Http\Controllers\Backend\BlogCategoryController::class);
		
        // Route for Blog
		Route::resource('/blog', App\Http\Controllers\Backend\BlogController::class);
		
        // Route for FAQ
		Route::resource('/faq', App\Http\Controllers\Backend\FaqController::class);

		// Route for User
		Route::resource('/admin', App\Http\Controllers\Backend\AdminController::class);

		// Route for BlogComment
		Route::resource('/blog-comment', App\Http\Controllers\Backend\BlogCommentController::class);
	});
});



Route::fallback(function () {
	return response()->view('errors.404', [], 404);
});