<?php

use Illuminate\Http\Request;

use App\Models\Cat;
use App\Models\Product;

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// Route::get('user/{name}', function ($name) {
//     //
// })->where('name', '[A-Za-z]+');

// Route::get('user/{id}', function ($id) {
//     //
// })->where('id', '[0-9]+');

// Route::get('user/{id}/{name}', function ($id, $name) {
//     //
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


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


/**
 * Роуты аутентификации...
 */
// https://laravel.com/docs/6.x/authentication
 
//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы (логаут)
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Маршруты регистрации...
 */
//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');
 
/**
 * URL для сброса пароля...
 */
 
//POST запрос для отправки email письма пользователю для сброса пароля
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//ссылка для сброса пароля (можно размещать в письме)
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//страница с формой для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//POST запрос для сброса старого и установки нового пароля
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



// password.update

// Auth::routes();

// Route::get('/home', 'HomeController@index');
// Route::get('/home', 'ManagerController@index');
// Route::get('/manager', 'ManagerController@index');


// Route::get('/session', function (Request $request) {
//     return $request->session()->getId();
// });



// Route::get('/cats', 'CatController@index');

// v1/ redirect
Route::get('/api/v1/{model}', function ($model) {
    return redirect('/api/'.$model);
});

Route::post('/api/v1/{model}', function ($model) {
    return redirect('/api/'.$model);
});


Route::get('/api/v1/{model}/{id}', function ($model, $id) {
    return redirect('/api/'.$model.'/'.$id);
});

Route::post('/api/v1/{model}/{id}', function ($model, $id) {
    return redirect('/api/'.$model.'/'.$id);
});


// Route::get('user/{name?}', function ($name = 'John') {
//     return $name;
// });
// Route::resource('users', 'UserController', ['only' => [
//     'index', 'show'
// ]]);



// Route::get('/cats', 'CatController@index');
// Route::get('/cat/{id}', 'CatController@show');
// Route::get('/cats_left', 'CatController@cats_left');
// Route::get('/cats_left/{id}', 'CatController@cats_left');

// Route::get('/products', 'ProductController@index');
// Route::get('/product/{id}', 'ProductController@show');
// Route::get('/product/{id}/to_cart/{qty}', 'ProductController@to_cart');
// Route::get('/product/{id}/remote_images', 'ProductController@remote_images');
// Route::get('/product/{product}/set_main_image/{img_id}', 'ProductController@set_main_image');
// Route::get('/product/{id}/remote_images/{img_id}/remove_image', 'ProductController@remove_image');

// // http://localhost:8000/product/1000072/remote_images

// // Route::get('/product/{id}/remote_images', 'ProductController@set_main_image');
// // $product, $img_url




// Route::get('/line_item_remove/{id}', 'LineItemController@remove');
// Route::get('/total_cart/{id}', 'CartController@total_cart');
// 
Route::group(['middleware' => 'auth'], function () {

    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
    // 
    Route::get('/manager', 'ManagerController@index');
    // Route::get('/manager', function () {
        // return view('manager');
    // });

    // Route::get('/administrator', function () {
    //     return view('administrator');
    // });




    Route::resource('metatexts', 'MetatextController');    
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('menus', 'MenuController');



    Route::get('/generator', function () {
        return view('generator');
    });
    Route::get('/file_manager1', function () {
        return view('file_manager1');
    });
    // 

    Route::get('/clear-cache', function() {
        // php artisan route:cache
        // php artisan cache:clear
        // php artisan config:cache
        // php artisan view:clear
        // Artisan::call('route:cache');
        // Artisan::call('cache:clear');
        // Artisan::call('config:cache');
        // Artisan::call('view:clear');
        
        // // php artisan optimize

        return "Cache is cleared";
    });

    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');


    // https://harish81.github.io/infyom-schema-generator/

    Route::get('/schema_builder', function () {
        return view('schema_builder');
    });

    // Route::get('/schema_builder', function () {
        // return view('schema_builder');
    // });

    Route::get('/chartjs', function () {
        return view('lte.charts.chartjs');
    });
    Route::get('/flot', function () {
        return view('lte.charts.flot');
    });
    Route::get('/widgets', function () {
        return view('lte.widgets');
    });

    Route::get('/face_builder', function () {
        return view('addons.face_builder');
    });

    Route::get('/phpinfo', function () {
        // return view('addons.info.phpinfo');
        return view('addons.info.phpinfo_standolone');
        
    });

    Route::get('/migrate', function () {
        Artisan::call('migrate');
        // return true;
        return redirect('/generator_builder');
    });




    Route::get('/sync', function (Request $request) {
        // Artisan::call('make:view '.$request->all()['viewName'].' --extends='.$request->all()['layoutName'].' --section=content');
        // return redirect('/manager');
        Artisan::call('import:cat');
        Artisan::call('import:product');
        Artisan::call('import:price');
        return "import all";
        // return redirect('/manager');
        // return view('sync');
    });

    Route::get('/schemaView', function (Request $request) {
        Artisan::call('make:view '.$request->all()['viewName'].' --extends=layouts.'.pathinfo($request->all()['viewName'])['filename'].' --section=content');
        return redirect('/generator_builder');
    });
    Route::get('/scrapView', function (Request $request) {
        Artisan::call('scrap:view '.pathinfo($request->all()['viewName'])['filename'].' --force');
        // return Artisan::call('scrap:view '.pathinfo($request->all()['viewName'])['filename'].' --force');
        return redirect('/generator_builder');
    });


    Route::resource('cats', 'CatController');
    Route::resource('products', 'ProductController');
    


    Route::resource('orders', 'OrderController');
    Route::get('/client_order_show/{client_order_show_id}', 'OrderController@client_order_show');

    Route::get('/route_list', function () {


    $routes = collect(\Route::getRoutes())
                    ->map(function ($route) { 
                            return  array(
                                            'domain' => $route->domain(),
                                            'method' => implode('|', $route->methods()),
                                            'uri'    => $route->uri(),
                                            'name'   => $route->getName(),
                                            'action' => ltrim($route->getActionName(), '\\'),
                                            'middleware' => collect($route->gatherMiddleware())
                                                            ->map(function ($middleware) {
                                                                return $middleware instanceof Closure ? 'Closure' : $middleware;
                                                            })->implode(','),
                                        ); 
                        });
    return $routes;
        // Artisan::call('route:list');
        // return response(Artisan::output(), 200)
        //       ->header('Content-Type', 'text/plain');
        // return Artisan::output();
        // return exec('php artisan route:list');
    });




    Route::get('cats_tree', 'CatController@cats_tree');
    Route::get('products_enable', 'ProductController@products_enable');



    Route::resource('subsEmails', 'SubsEmailController');
    //Route::get('/subsEmails/import', 'CartController@import');
    Route::post('/subsEmails/import', 'SubsEmailController@import');
    Route::get('/subsEmails_destroy_all', 'SubsEmailController@destroy_all');



    Route::resource('subsGroups', 'SubsGroupController');
    Route::post('/subsGroups/import', 'SubsGroupController@import');

    Route::resource('makeSubMails', 'MakeSubMailController');
    Route::get('/makeSubMails/{id}/add_group/{group_id}', 'MakeSubMailController@add_group');

    Route::resource('groupInMails', 'GroupInMailController');

    
    

    //Route::get('/makeSubMails/{id}/add_group/{group_id}', 'MakeSubMailController@add_group');


    Route::get('/run_subs_send', function (Request $request) {
        Artisan::call('subs:send');
        return "sent all";
    });


});
//  !!! END AUTH !!!




Route::get('/cart', function () {
    // session('cart');
    // return view('menu3.cart');
    return view('mcf_v2.cart')->with('cart', session('cart'));
});

Route::get('/mcf_cart', function () {
    // session('cart');
    // return view('menu3.cart');
    return view('mcf_v2.cart')->with('cart', session('cart'));
});


Route::get('/product/{ident}/to_cart/{qty}', 'ProductController@to_cart');
// Route::get('/cart/{cart_id}/product/{ident}/to_cart/{qty}', 'ProductController@to_cart');

    Route::get('/menu', function () {
        $cats = Cat::all();
        // $cart
        return view('menu3.menu3')->with('cats', $cats);
    });


    Route::get('/cats/{ident}/check_menu', 'CatController@check_menu');
    Route::get('/cats/{ident}/cats_products', 'CatController@cats_products');

    Route::get('/products/{ident}/check_menu', 'ProductController@check_menu');
    Route::get('/products/{ident}/check_menu2', 'ProductController@check_menu2');

    Route::get('/carts/{id}/total', 'CartController@total');
    Route::get('/carts/{id}/total_qty', 'CartController@total_qty');
    Route::get('/carts/{id}/clear', 'CartController@remove_items');
    Route::get('/carts/{id}/checkout', 'CartController@checkout');


    Route::get('carts_destroy_all', 'CartController@destroy_all');

    Route::resource('carts', 'CartController');


    Route::get('/orders/{id}/total', 'OrderController@total');
    Route::get('/orders/{id}/total_qty', 'OrderController@total_qty');
    Route::get('/orders/{id}/clear', 'OrderController@remove_items');
    Route::get('/orders/{id}/checkout', 'OrderController@checkout');
    
    Route::get('orders_destroy_all', 'OrderController@destroy_all');

    Route::get('/orders/{id}/add_product_item/{product_id}', 'OrderController@add_product_item');

    Route::get('/orders/{id}/generateDocx', 'OrderController@generateDocx');
    

    Route::get('/lineItems/{id}/del', 'LineItemController@del');

    Route::get('/lineItems_destroy_all',    'LineItemController@destroy_all');
    Route::get('/qty_minus/{id}',           'LineItemController@qty_minus');
    Route::get('/qty_plus/{id}',            'LineItemController@qty_plus');
    Route::get('/lineItems/total/{id}',     'LineItemController@total');
// MENU
// Route::get('/menu', 'MenuController@index');


    Route::get('/thanks/{id}', 'CartController@thanks');
    Route::get('/thanks', 'CartController@thanks');

// Route::get('/thanks', function () {
//     return view('menu3.thanks');
// });


// Route::get('/', function () {
//     return view('menu3.index_site');
// });

Route::group(['middleware'=>'language'],function ()
{

// 'locale' => 'en',  // config/app.php
//  Session::put('locale',Config::get('app.locale')); // in middleware code we use Config method to get app configuration locale
// App::setLocale(session('locale')); // finally set this to app locale

    //your translation routes
    Route::get('/', function () {
        $chits = \App\Models\Chit::where('active','=',1)->get();
        return view('mcf_v2.root')
            ->with('chits', $chits);
    });

    Route::get('setlocale/{locale}',function($lang){
           \Session::put('locale',$lang);
           return redirect()->back();
    });

    // отзызвы
    Route::get('/show_chits', function () {
        $chits = \App\Models\Chit::where('active','=',1)->get();
        return view('mcf_v2.show_chits')
            ->with('chits', $chits);
    });


    // О нас
    Route::get('/mcf_about_us', function () {
        return view('mcf_v2.about_us');
    });

    // 
    Route::get('/mcf_service', function () {
        return view('mcf_v2.service');
    });

    Route::get('/mcf_shops', function () {
        return view('mcf_v2.mcf_shops');
    });

});


//Route::get('/',     'LineItemController@total');


// Route::get('/reservation', function () {
//     return view('menu3.reservation');
// });

// Route::get('/about', function () {
//     return view('menu3.about');
// });
// Route::get('/about2', function () {
//     return view('menu3.about2');
// });





// rs-fullwidth-wrap


Route::get('/admin2_start', function () {
    return view('menu3.admin2_start');
});

Route::get('/admin2_mindmap', function () {
    return view('menu3.admin2_mindmap');
});



Route::get('/mcf_products/{ident}', function ($ident) {
        $product = Product::find($ident);
        $comments=\App\Models\ProductComment::where(['product_id'=>$product->ident, 'allowed'=>true])->get();
        // dd($comments);
        return view('mcf_v2.mcf_products')
            ->with('comments', $comments)
            ->with('product', $product);
    // return view('mcf_v2.mcf_product');
});

// Route::get('/mcf_cat/{ident}', function ($ident, Request $request) {

//     $language = $request->selected_language ?? 'ru';
//     session(['selected_language' =>$language]);
//     App::setLocale($language);

//         $cat2 = Cat::find($ident);
//         return view('mcf_v2.mcf_cat')->with('cat2', $cat2);
// });



Route::resource('mcf_cats', 'CatController');
    
Route::get('/mcf_cats', function () {
        $cats = Cat::all();
        return view('mcf_v2.mcf_cats')->with('cats', $cats);
    // return view('mcf_v2.mcf_product');
});

Route::get('/mcf_cat/{ident}', function ($ident, Request $request) {

    $language = $request->selected_language ?? 'ru';
    session(['selected_language' =>$language]);
    App::setLocale($language);

        $cat2 = Cat::find($ident);
        $prds = \App\Models\Product::where(['cat_id'=>$ident, 'menu'=>true])->get();
        // return view('mcf_v2.mcf_cat')->with('cat2', $cat2);
        return view('mcf_v2.mcf_cat')->with('prds', $prds)->with('cat2', $cat2);
});

// Route::get('/mcf_v2', function () {
//     return view('layouts.mcf_v2');
// });


Route::get('/mcf_blog/{id}', function ($id) {
    $mcf_blog_id = 1;
    return view('mcf_v2.mcf_blog')->with('mcf_blog_id', $mcf_blog_id);;
});

Route::get('/mcf_blogs', function () {
        // $blogs = Post::all()->get();

        $cats = Cat::all();
        return view('mcf_v2.mcf_blogs')->with('cats', $cats);

        // return view('mcf_v2.mcf_blogs')->with('cats', $cats);

    // return view('mcf_v2.mcf_blogs');
});
    Route::resource('lineItems',            'LineItemController');





// php artisan route:list

// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/



// });



    Route::get('/HTTP_ACCEPT_LANGUAGE', function (Request $request) {
        // $a = explode(',', $request->server('HTTP_ACCEPT_LANGUAGE'));
        // if (explode('-',$a[0])[0]=='ru') {
        //     $lang='ru';
        // } else {
        //     $lang='en';
        // }
        // echo trans("Login");

        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            

            if ($locale != 'ru') {
                $locale = 'en';
            }
        }
        // App::setLocale($locale);

        if (!empty($request->all()['_lang'])) {

            if ($request->all()['_lang'] != 'ru') {
                $locale = 'en';
            } else {
                $locale = 'ru';
            }
            // dd($locale);
        }

        Session::put('locale', $locale);
        App::setLocale($locale);
        // $lang=App::getLocale();

        return trans("mcf title");
        // return trans("Login");
        // return $lang;
        // return dd($request);

        // return trans("Login");

    });


    Route::get('/mcf_contact', function (Request $request) {

        // $language = $request->selected_language ?? 'ru';
        // session(['selected_language' =>$language]);
        // App::setLocale($language);

        return view('mcf_v2.contact');
    });
    Route::get('/mcf_media', function (Request $request) {

        // $language = $request->selected_language ?? 'ru';
        // session(['selected_language' =>$language]);
        // App::setLocale($language);

        return view('mcf_v2.mcf_media');
    });



// Route::get('/contact', function () {
//     return view('mcf_v2.contact1');
// });



Route::get('/contact_us', function (Request $request) {
    // contact_us
    // message
    // Route::get('/menu', function () {
        // $cats = Cat::all();
        // $cart
        // return view('menu3.menu3')->with('cats', $cats);
    // });
    // dd($request->all()['your-contact']);
if (isset($request->all()['your-contact']) && isset($request->all()['_token'])) {
    # code...

    $contact = $request->all()['your-contact'];
    $mes = $request->all()['your-message'];

    Mail::send('email',
       array(
           'contact' => $contact,
           'mes' => $mes
       ), function($sendm)
   {
       $sendm->from(env('MAIL_USERNAME', 'mcfzavod@gmail.com'));
       $sendm->to(env('MAIL_USERNAME', 'mcfzavod@gmail.com'), 'Запрос с сайта')->subject('Запрос с сайта mcfzavod.com');
   });

    return view('mcf_v2.contact_us')->with('contact', $contact)->with('mes', $mes);
} else {
    # code...
    return view('mcf_v2.contact_us')->with('contact', '$contact')->with('mes', '$mes');
}
})->name('contact_us');


Route::get('setlocale/{locale}', function (Request $request, $locale) {

    $language = $request->language ?? 'ru';
    session(['selected_language' =>$language]);
    // App::setLocale(session('selected_language'));
    App::setLocale($locale);

    $locale_get = App::getLocale();
    return $locale_get;
    //
});


Route::get('getlocale', function (Request $request) {
    $locale_get = App::getLocale();
    return $locale_get;
});






// Route::resource('images', 'ImageController');
// Route::get('/blocks_destroy_all', 'BlockController@destroy_all');
// Route::get('/blocks/import', 'BlockController@import');






Route::get('/post_comment', 'ProductCommentController@post_comment');
// Route::post('/post_comment', 'ProductCommentController@post_comment');

Route::post('/productComments/import', 'ProductCommentController@import');
Route::get('/productComments/destroy_all', 'ProductCommentController@destroy_all');
Route::get('/productComments_destroy_all', 'ProductCommentController@destroy_all');
Route::resource('productComments', 'ProductCommentController');



Route::resource('chits', 'ChitController');
Route::get('/chits_destroy_all', 'ChitController@destroy_all');
Route::post('/chits/import', 'ChitController@import');


Route::resource('mediaFiles', 'MediaFileController');
Route::get('/mediaFiles_destroy_all', 'MediaFileController@destroy_all');
Route::post('/mediaFiles/import', 'MediaFileController@import');




Route::get('/articles_destroy_all', 'ArticleController@destroy_all');
Route::post('/articles/import', 'ArticleController@import');
Route::get('/articles/export', 'ArticleController@export');
Route::resource('articles', 'ArticleController');



Route::resource('docFiles', 'DocFileController');
Route::get('/docFiles_destroy_all', 'DocFileController@destroy_all');
Route::post('/docFiles/import', 'DocFileController@import');

    // [your site path]/Http/routes.php
    // Route::any('captcha-test', function() {
    //     if (request()->getMethod() == 'POST') {
    //         $rules = ['captcha' => 'required|captcha'];
    //         $validator = validator()->make(request()->all(), $rules);
    //         if ($validator->fails()) {
    //             echo '<p style="color: #ff0000;">Incorrect!</p>';
    //         } else {
    //             echo '<p style="color: #00ff30;">Matched :)</p>';
    //         }
    //     }
    
    //     $form = '<form method="post" action="captcha-test">';
    //     $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    //     $form .= '<p>' . captcha_img() . '</p>';
    //     $form .= '<p><input type="text" name="captcha"></p>';
    //     $form .= '<p><button type="submit" name="check">Check</button></p>';
    //     $form .= '</form>';
    //     return $form;
    // });