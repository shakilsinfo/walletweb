<?php

	use Illuminate\Support\Facades\Route;

	Auth::routes();
	Route::middleware(['auth'])->group(function () {
		Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home.index');

		Route::resource('course-category', App\Http\Controllers\Backend\CourseCategoryController::class);
		Route::get('course-category/destroy/{id}', [App\Http\Controllers\Backend\CourseCategoryController::class,'destroy'])->name('course-category.destroy');
		
		Route::resource('courses', App\Http\Controllers\Backend\CourseController::class);
		Route::get('courses/destroy/{id}', [App\Http\Controllers\Backend\CourseController::class,'destroy'])->name('courses.destroy');
		
		Route::resource('course-lesson', App\Http\Controllers\Backend\CourseLessonController::class);
		Route::resource('purchase-list', App\Http\Controllers\Backend\PurchaseController::class);
		
		Route::get('course-lesson/destroy/{id}', [App\Http\Controllers\Backend\CourseLessonController::class,'destroy'])->name('course-lesson.destroy');
		Route::resource('purchase-list', App\Http\Controllers\Backend\PurchaseController::class);

		Route::resource('blog-list', App\Http\Controllers\Backend\BlogController::class);
		Route::get('blog-list/destroy/{id}', [App\Http\Controllers\Backend\BlogController::class,'destroy'])->name('blog-list.destroy');

		Route::resource('blog-category', App\Http\Controllers\Backend\BlogCategoryController::class);
		Route::get('blog-category/destroy/{id}', [App\Http\Controllers\Backend\BlogCategoryController::class,'destroy'])->name('blog-category.destroy');
		Route::get('user-list', [App\Http\Controllers\Backend\HomeController::class,'userList'])->name('userList');
		Route::get('user-list/destroy/{id}', [App\Http\Controllers\Backend\HomeController::class,'userDelete'])->name('userDelete');
	});