<?php

Route::post('register', [\App\Http\Controllers\Api\V1\Admin\AuthApiController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\V1\Admin\AuthApiController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\Api\V1\Admin\AuthApiController::class, 'logout'])->middleware('auth:sanctum');


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Brands
    Route::apiResource('brands', 'BrandsApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Posts
    Route::post('posts/media', 'PostsApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostsApiController');

//    // Faq Category
//    Route::apiResource('faq-categories', 'FaqCategoryApiController');
//
//    // Faq Question
//    Route::apiResource('faq-questions', 'FaqQuestionApiController');


});
