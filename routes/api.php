<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', 'UserAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('permissions', 'PermissionAPIController');

Route::resource('menus', 'MenuAPIController');

Route::resource('cats', 'CatAPIController');







Route::resource('line_items', 'LineItemAPIController');



Route::resource('products', 'ProductAPIController');



Route::resource('metatexts', 'MetatextAPIController');





Route::resource('subs_emails', 'SubsEmailAPIController');

Route::resource('subs_groups', 'SubsGroupAPIController');

Route::resource('make_sub_mails', 'MakeSubMailAPIController');

Route::resource('group_in_mails', 'GroupInMailAPIController');



