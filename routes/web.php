<?php

/*

8 8888      88    d888888o.   8 8888888888
8 8888      88  .`8888:' `88. 8 8888
8 8888      88  8.`8888.   Y8 8 8888
8 8888      88  `8.`8888.     8 8888
8 8888      88   `8.`8888.    8 888888888888
8 8888      88    `8.`8888.   8 8888
8 8888      88     `8.`8888.  8 8888
` 8888     ,8P 8b   `8.`8888. 8 8888
  8888   ,d8P  `8b.  ;8.`8888 8 8888
   `Y88888P'    `Y8888P ,88P' 8 888888888888
*/

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




/*


########  ######## ########  #### ########  ########  ######  ########
##     ## ##       ##     ##  ##  ##     ## ##       ##    ##    ##
##     ## ##       ##     ##  ##  ##     ## ##       ##          ##
########  ######   ##     ##  ##  ########  ######   ##          ##
##   ##   ##       ##     ##  ##  ##   ##   ##       ##          ##
##    ##  ##       ##     ##  ##  ##    ##  ##       ##    ##    ##
##     ## ######## ########  #### ##     ## ########  ######     ##


*/
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




    /*


    ##          ###    ##    ##  ######   ##     ##    ###     ######   ########
    ##         ## ##   ###   ## ##    ##  ##     ##   ## ##   ##    ##  ##
    ##        ##   ##  ####  ## ##        ##     ##  ##   ##  ##        ##
    ##       ##     ## ## ## ## ##   #### ##     ## ##     ## ##   #### ######
    ##       ######### ##  #### ##    ##  ##     ## ######### ##    ##  ##
    ##       ##     ## ##   ### ##    ##  ##     ## ##     ## ##    ##  ##
    ######## ##     ## ##    ##  ######    #######  ##     ##  ######   ########



    */
    Route::group(['middleware'=>'language'],function ()
    {
        // setlocale
        Route::get('setlocale/{locale}',function($lang){
               \Session::put('locale',$lang);
               return redirect()->back();
        });

        // root
        Route::get('/', function () {
            $chits = \App\Models\Chit::where('active','=',1)->get();
            return view('mcf_v2.root')
                ->with('chits', $chits);
        });

        /*

            ##        #######   ######   #### ##    ##
            ##       ##     ## ##    ##   ##  ###   ##
            ##       ##     ## ##         ##  ####  ##
            ##       ##     ## ##   ####  ##  ## ## ##
            ##       ##     ## ##    ##   ##  ##  ####
            ##       ##     ## ##    ##   ##  ##   ###
            ########  #######   ######   #### ##    ##

        */
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



        /*

             ######     ###    ########  ########
            ##    ##   ## ##   ##     ##    ##
            ##        ##   ##  ##     ##    ##
            ##       ##     ## ########     ##
            ##       ######### ##   ##      ##
            ##    ## ##     ## ##    ##     ##
             ######  ##     ## ##     ##    ##

        */
        //your translation routes
        Route::get('/thanks/{id}', 'CartController@thanks');
        Route::get('/thanks', 'CartController@thanks');
        Route::get('/mcf_cart', function () {
            // session('cart');
            // return view('menu3.cart');
            return view('mcf_v2.cart')->with('cart', session('cart'));
        });

        /*

             ######     ###    ########    ###    ##        #######   ######
            ##    ##   ## ##      ##      ## ##   ##       ##     ## ##    ##
            ##        ##   ##     ##     ##   ##  ##       ##     ## ##
            ##       ##     ##    ##    ##     ## ##       ##     ## ##   ####
            ##       #########    ##    ######### ##       ##     ## ##    ##
            ##    ## ##     ##    ##    ##     ## ##       ##     ## ##    ##
             ######  ##     ##    ##    ##     ## ########  #######   ######

        */

        Route::get('/mcf_cats', function () {
            $cats = Cat::all();
            return view('mcf_v2.mcf_cats')->with('cats', $cats);
        // return view('mcf_v2.mcf_product');
        });

        Route::get('/mcf_cat/{ident}', function ($ident, Request $request) {
            $cat2 = Cat::find($ident);
            $prds = \App\Models\Product::where(['cat_id'=>$ident, 'menu'=>true])->get();
            // return view('mcf_v2.mcf_cat')->with('cat2', $cat2);
            return view('mcf_v2.mcf_cat')->with('prds', $prds)->with('cat2', $cat2);
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
        // Route::resource('mcf_cats', 'CatController');

        Route::get('/client_order_show/{client_order_show_id}', 'OrderController@client_order_show');


        /*
             ######   #######  ##    ## ########    ###     ######  ########
            ##    ## ##     ## ###   ##    ##      ## ##   ##    ##    ##
            ##       ##     ## ####  ##    ##     ##   ##  ##          ##
            ##       ##     ## ## ## ##    ##    ##     ## ##          ##
            ##       ##     ## ##  ####    ##    ######### ##          ##
            ##    ## ##     ## ##   ###    ##    ##     ## ##    ##    ##
             ######   #######  ##    ##    ##    ##     ##  ######     ##        
        */
        Route::get('/mcf_contact', function (Request $request) {
            return view('mcf_v2.contact');
        });

        Route::get('/contact_us', function (Request $request) {



            if (isset($request->all()['your-contact']) && isset($request->all()['_token']) && $request->all()['spam_check']==1 ) {
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
                return view('mcf_v2.contact_us')->with('contact', '$contact')->with('mes', '$mes');
            }
        })->name('contact_us');


        /*
            ########     ###     ######   ########  ######
            ##     ##   ## ##   ##    ##  ##       ##    ##
            ##     ##  ##   ##  ##        ##       ##
            ########  ##     ## ##   #### ######    ######
            ##        ######### ##    ##  ##             ##
            ##        ##     ## ##    ##  ##       ##    ##
            ##        ##     ##  ######   ########  ######            
        */ 

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


        // сервис
        Route::get('/mcf_service', function () {
            return view('mcf_v2.service');
        });


        // представители
        Route::get('/mcf_shops', function () {
            $mcf_shops=\App\Models\ContactContractor::all();
            return view('mcf_v2.mcf_shops')
                    ->with('mcf_shops', $mcf_shops);
        });

        // Медиа
        Route::get('/mcf_media', function (Request $request) {
            return view('mcf_v2.mcf_media');
        });


        // Route::get('/mcf_blog/{id}', function ($id) {
        //     $mcf_blog_id = 1;
        //     return view('mcf_v2.mcf_blog')->with('mcf_blog_id', $mcf_blog_id);;
        // });

        // Route::get('/mcf_blogs', function () {
        //         $cats = Cat::all();
        //         return view('mcf_v2.mcf_blogs')->with('cats', $cats);
        // });


        Route::get('/post_comment', 'ProductCommentController@post_comment');


    });


/*


   ###    ##     ## ######## ##     ##
  ## ##   ##     ##    ##    ##     ##
 ##   ##  ##     ##    ##    ##     ##
##     ## ##     ##    ##    #########
######### ##     ##    ##    ##     ##
##     ## ##     ##    ##    ##     ##
##     ##  #######     ##    ##     ##


*/

Route::group(['middleware' => 'auth'], function () {


    /*

    ##          ###    ##    ##  ######   ##     ##    ###     ######   ########
    ##         ## ##   ###   ## ##    ##  ##     ##   ## ##   ##    ##  ##
    ##        ##   ##  ####  ## ##        ##     ##  ##   ##  ##        ##
    ##       ##     ## ## ## ## ##   #### ##     ## ##     ## ##   #### ######
    ##       ######### ##  #### ##    ##  ##     ## ######### ##    ##  ##
    ##       ##     ## ##   ### ##    ##  ##     ## ##     ## ##    ##  ##
    ######## ##     ## ##    ##  ######    #######  ##     ##  ######   ########



    */
    Route::group(['middleware'=>'language'],function ()
    {
        Route::get('/manager', 'ManagerController@index');

        Route::resource('chits', 'ChitController');
        Route::resource('mediaFiles', 'MediaFileController');
        Route::resource('docFiles', 'DocFileController');
        Route::resource('contactContractors', 'ContactContractorController');
        Route::resource('metatexts', 'MetatextController');    
        Route::resource('menus', 'MenuController');

        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');



        /*

            ######## #### ##       ######## ##     ##    ###    ##    ##    ###     ######   ######## ########
            ##        ##  ##       ##       ###   ###   ## ##   ###   ##   ## ##   ##    ##  ##       ##     ##
            ##        ##  ##       ##       #### ####  ##   ##  ####  ##  ##   ##  ##        ##       ##     ##
            ######    ##  ##       ######   ## ### ## ##     ## ## ## ## ##     ## ##   #### ######   ########
            ##        ##  ##       ##       ##     ## ######### ##  #### ######### ##    ##  ##       ##   ##
            ##        ##  ##       ##       ##     ## ##     ## ##   ### ##     ## ##    ##  ##       ##    ##
            ##       #### ######## ######## ##     ## ##     ## ##    ## ##     ##  ######   ######## ##     ##

        */

        Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
        Route::get('/file_manager1', function () {
            return view('file_manager1');
        });


        /*

             ######     ###    ########    ###    ##        #######   ######
            ##    ##   ## ##      ##      ## ##   ##       ##     ## ##    ##
            ##        ##   ##     ##     ##   ##  ##       ##     ## ##
            ##       ##     ##    ##    ##     ## ##       ##     ## ##   ####
            ##       #########    ##    ######### ##       ##     ## ##    ##
            ##    ## ##     ##    ##    ##     ## ##       ##     ## ##    ##
             ######  ##     ##    ##    ##     ## ########  #######   ######

        */


        Route::resource('cats', 'CatController');
        Route::get('cats_tree', 'CatController@cats_tree');

        Route::resource('products', 'ProductController');
        Route::get('products_enable', 'ProductController@products_enable');

        Route::resource('orders', 'OrderController');
        Route::get('orders_destroy_all', 'OrderController@destroy_all');


    });
    // END Languages


    /*
         ######  ##     ##    ###    ########  ########  ######
        ##    ## ##     ##   ## ##   ##     ##    ##    ##    ##
        ##       ##     ##  ##   ##  ##     ##    ##    ##
        ##       ######### ##     ## ########     ##     ######
        ##       ##     ## ######### ##   ##      ##          ##
        ##    ## ##     ## ##     ## ##    ##     ##    ##    ##
         ######  ##     ## ##     ## ##     ##    ##     ######    
    */

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








    /*

         ######  ######## ########  ##     ## ####  ######  ########
        ##    ## ##       ##     ## ##     ##  ##  ##    ## ##
        ##       ##       ##     ## ##     ##  ##  ##       ##
         ######  ######   ########  ##     ##  ##  ##       ######
              ## ##       ##   ##    ##   ##   ##  ##       ##
        ##    ## ##       ##    ##    ## ##    ##  ##    ## ##
         ######  ######## ##     ##    ###    ####  ######  ########

    */


    Route::get('/route_list', function () {
        // dd(\Route::getRoutes());

        // $routes = collect(\Route::getRoutes())
        //                 ->map(function ($route) { 
        //                         return  array(
        //                                         'domain' => $route->domain(),
        //                                         'method' => implode('|', $route->methods()),
        //                                         'uri'    => $route->uri(),
        //                                         'name'   => $route->getName(),
        //                                         'action' => ltrim($route->getActionName(), '\\'),
        //                                         'middleware' => collect($route->gatherMiddleware())
        //                                                         ->map(function ($middleware) {
        //                                                             return $middleware instanceof Closure ? 'Closure' : $middleware;
        //                                                         })->implode(','),
        //                                     ); 
        //                     });
        // return dd('Route::getRoutes()');
    });



    /*
         ######  ##    ## ##    ##  ######
        ##    ##  ##  ##  ###   ## ##    ##
        ##         ####   ####  ## ##
         ######     ##    ## ## ## ##
              ##    ##    ##  #### ##
        ##    ##    ##    ##   ### ##    ##
         ######     ##    ##    ##  ######
    */

    Route::get('/sync', function (Request $request) {
        Artisan::call('import:cat');
        Artisan::call('import:product');
        Artisan::call('import:price');
        return "import all";
    });


    /*


         ######   ######## ##    ## ######## ########     ###    ########  #######  ########
        ##    ##  ##       ###   ## ##       ##     ##   ## ##      ##    ##     ## ##     ##
        ##        ##       ####  ## ##       ##     ##  ##   ##     ##    ##     ## ##     ##
        ##   #### ######   ## ## ## ######   ########  ##     ##    ##    ##     ## ########
        ##    ##  ##       ##  #### ##       ##   ##   #########    ##    ##     ## ##   ##
        ##    ##  ##       ##   ### ##       ##    ##  ##     ##    ##    ##     ## ##    ##
         ######   ######## ##    ## ######## ##     ## ##     ##    ##     #######  ##     ##



    */

    Route::get('/generator', function () {
        return view('generator');
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

    Route::get('/migrate', function () {
        Artisan::call('migrate');
        // return true;
        return redirect('/generator_builder');
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







    /*

         ######     ###     ######  ##     ## ########
        ##    ##   ## ##   ##    ## ##     ## ##
        ##        ##   ##  ##       ##     ## ##
        ##       ##     ## ##       ######### ######
        ##       ######### ##       ##     ## ##
        ##    ## ##     ## ##    ## ##     ## ##
         ######  ##     ##  ######  ##     ## ########
    
    */
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




    /*


        ##     ##    ###    #### ##
        ###   ###   ## ##    ##  ##
        #### ####  ##   ##   ##  ##
        ## ### ## ##     ##  ##  ##
        ##     ## #########  ##  ##
        ##     ## ##     ##  ##  ##
        ##     ## ##     ## #### ########


    */

    Route::resource('subsEmails', 'SubsEmailController');
    //Route::get('/subsEmails/import', 'CartController@import');
    Route::post('/subsEmails/import', 'SubsEmailController@import');
    Route::get('/subsEmails_destroy_all', 'SubsEmailController@destroy_all');

    Route::resource('subsGroups', 'SubsGroupController');
    Route::post('/subsGroups/import', 'SubsGroupController@import');

    Route::resource('makeSubMails', 'MakeSubMailController');
    Route::get('/makeSubMails/{id}/add_group/{group_id}', 'MakeSubMailController@add_group');

    Route::resource('groupInMails', 'GroupInMailController');

    Route::get('/run_subs_send', function (Request $request) {
        Artisan::call('subs:send');
        return "sent all";
    });
    //Route::get('/makeSubMails/{id}/add_group/{group_id}', 'MakeSubMailController@add_group');



    /*
     #######  ########  ########  ######## ########
    ##     ## ##     ## ##     ## ##       ##     ##
    ##     ## ##     ## ##     ## ##       ##     ##
    ##     ## ########  ##     ## ######   ########
    ##     ## ##   ##   ##     ## ##       ##   ##
    ##     ## ##    ##  ##     ## ##       ##    ##
     #######  ##     ## ########  ######## ##     ##
    */

    Route::get('/orders/{id}/total', 'OrderController@total');
    Route::get('/orders/{id}/total_qty', 'OrderController@total_qty');
    Route::get('/orders/{id}/clear', 'OrderController@remove_items');
    // Route::get('/orders/{id}/checkout', 'OrderController@checkout');

    Route::get('/orders/{id}/add_product_item/{product_id}', 'OrderController@add_product_item');

    Route::get('/orders/{id}/generateDocx', 'OrderController@generateDocx');

    Route::get('orders_destroy_all', 'OrderController@destroy_all');



    /*
        ########     ###     ######   ########  ######
        ##     ##   ## ##   ##    ##  ##       ##    ##
        ##     ##  ##   ##  ##        ##       ##
        ########  ##     ## ##   #### ######    ######
        ##        ######### ##    ##  ##             ##
        ##        ##     ## ##    ##  ##       ##    ##
        ##        ##     ##  ######   ########  ######            
    */ 



    Route::post('/productComments/import', 'ProductCommentController@import');
    Route::get('/productComments/destroy_all', 'ProductCommentController@destroy_all');
    Route::get('/productComments_destroy_all', 'ProductCommentController@destroy_all');
    Route::resource('productComments', 'ProductCommentController');



    Route::get('/chits_destroy_all', 'ChitController@destroy_all');
    Route::post('/chits/import', 'ChitController@import');


    Route::get('/mediaFiles_destroy_all', 'MediaFileController@destroy_all');
    Route::post('/mediaFiles/import', 'MediaFileController@import');


    Route::get('/articles_destroy_all', 'ArticleController@destroy_all');
    Route::post('/articles/import', 'ArticleController@import');
    Route::get('/articles/export', 'ArticleController@export');
    Route::resource('articles', 'ArticleController');


    Route::get('/docFiles_destroy_all', 'DocFileController@destroy_all');
    Route::post('/docFiles/import', 'DocFileController@import');


    Route::resource('lineItems',            'LineItemController');

    Route::get('carts_destroy_all', 'CartController@destroy_all');
    Route::resource('carts', 'CartController');

    Route::get('/cats/{ident}/check_menu', 'CatController@check_menu');
    Route::get('/cats/{ident}/cats_products', 'CatController@cats_products');

    Route::get('/products/{ident}/check_menu', 'ProductController@check_menu');
    Route::get('/products/{ident}/check_menu2', 'ProductController@check_menu2');



});
//  !!! END AUTH !!!





    /*

         ######     ###    ########  ########
        ##    ##   ## ##   ##     ##    ##
        ##        ##   ##  ##     ##    ##
        ##       ##     ## ########     ##
        ##       ######### ##   ##      ##
        ##    ## ##     ## ##    ##     ##
         ######  ##     ## ##     ##    ##

    */

    // to cart and order functions
    Route::get('/product/{ident}/to_cart/{qty}', 'ProductController@to_cart');

    Route::get('/carts/{id}/total',         'CartController@total');
    Route::get('/carts/{id}/total_qty',     'CartController@total_qty');
    Route::get('/carts/{id}/clear',         'CartController@remove_items');
    Route::get('/carts/{id}/checkout',      'CartController@checkout');

    
    Route::get('/lineItems/{id}/del',       'LineItemController@del');
    Route::get('/lineItems_destroy_all',    'LineItemController@destroy_all');
    Route::get('/qty_minus/{id}',           'LineItemController@qty_minus');
    Route::get('/qty_plus/{id}',            'LineItemController@qty_plus');
    Route::get('/lineItems/total/{id}',     'LineItemController@total');




