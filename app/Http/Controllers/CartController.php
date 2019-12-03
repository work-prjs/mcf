<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Repositories\CartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

use App\Models\Cart;
use Mail;
use Illuminate\Support\Facades\Redirect;


class CartController extends AppBaseController
{
    /** @var  CartRepository */
    private $cartRepository;
    public $status;
    public $pay_types;
    public $pay_places;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
        $this->status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];
        $this->pay_types = ['Оплата на месте', 'Онлайн оплата Картой', 'Выставить счёт'];
        $this->pay_places = ['Доставка курьером', 'Самовывоз', 'Почтой'];
    }

    /**
     * Display a listing of the Cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carts = $this->cartRepository->paginate(10);

        return view('carts.index')
            ->with('carts', $carts);
    }


    /**
     * Show the form for creating a new Cart.
     *
     * @return Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created Cart in storage.
     *
     * @param CreateCartRequest $request
     *
     * @return Response
     */
    public function store(CreateCartRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/carts');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $cart = $this->cartRepository->create($input);

        Flash::success('Корзина успешно сохранена.');

        return redirect(route('carts.index'));
    }

    /**
     * Display the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart объект не найден');

            return redirect(route('carts.index'));
        }

        return view('carts.show')->with('cart', $cart);
    }

    /**
     * Show the form for editing the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart объект не найден');

            return redirect(route('carts.index'));
        }

        return view('carts.edit')->with('cart', $cart);
    }




    /**
     * Update the specified Cart in storage.
     *
     * @param int $id
     * @param UpdateCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartRequest $request)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart объект не найден');

            return redirect(route('carts.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/carts');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $cart = $this->cartRepository->update($input, $id);

        Flash::success('Корзина обновлена успешно.');

        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Корзина объект не найден');

            return redirect(route('carts.index'));
        }

        // TODO Удаляем файл
        if ( file_exists( getcwd().$cart['image']) ) {
            # code..
            // unlink( getcwd().$cart['image'] );
        }

        $this->cartRepository->delete($id);

        Flash::success('Корзина удалена.');

        return redirect(route('carts.index'));
    }


    public function destroy_all()
    {
        Cart::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('carts.index'));
    }


    public function total($id)
    {
        $cart = Cart::find($id);
        return $cart->total();
    }

    public function total_qty($id)
    {
        $cart = Cart::find($id);
        return $cart->total_qty();
    }
    public function remove_items($id)
    {
        $cart = Cart::find($id);
        $cart->remove_items();
        return Redirect::back();
        //return redirect;
    }


    public function checkout($id, Request $request)
    {



        $input = $request->all();

  //       // if ($request->hasFile('image')) {
  //       //     $path = $request->file('image')->store('public/carts');
  //       //     $publicPath = \Storage::url( $path );
  //       //     $input['image'] = $publicPath;
  //       // }

        $cart = Cart::find($id);
        // $cart = Cart::findOrFail($id);
        if ($cart == null) {
    		// return 'error нет корзины';
    		 return abort(404);
        }
    	else
    		{

  // $input["my_place"] => "0"
  // $input["stol_number"] => "STOL1"
  // $input["hotel_number"] => "HOTEL1"
  // $input["contact_adr"] => "ADRES ZAKAZ"
  // $input["contact_number"] => "+79622841331"

    	// if (isset($input['my_place'])) {
        if (isset($input['pay_type'])) {

            // if ($input['my_place']==0) {
            //     $pay_adr = "Стол в заведении ".$input['stol_number'];
            // }
            // if ($input['my_place']==1) {
            //     $pay_adr = "Номер в отеле ".$input['hotel_number'];
            // }
            // if ($input['my_place']==2) {
            //     $pay_adr = $input['contact_adr'];
            // }

            // if ($input['pay_adr']) {
                $pay_adr = $input['pay_adr'];
            // }

            $contact_number = $input['contact_number'];
            // $comment = $input['comment'];


            // $table->string('pay_type')->nullable();
            // $table->string('pay_place')->nullable();
            // $table->longText('pay_adr')->nullable();
            // $table->string('pay_contact')->nullable();
            // $table->decimal('pay_discount')->nullable();
            // $table->string('status')->nullable();
            // $table->longText('comment')->nullable();
            // $table->timestamps();

            $check = \App\Models\Order::create( ['pay_type' => $input['pay_type'], 'pay_place' => $input['pay_place'], 'pay_adr' => $pay_adr, 'pay_contact' => $contact_number, 'status' => '0' ]);

	        // $check = \App\Models\Order::create( [ 'pay_type' => $input['pay_type'], 'pay_place' => $input['pay_place'], 'pay_adr' => $input['pay_adr'], 'pay_contact' => $input['pay_contact'], 'status' => '0' ]);

            foreach ($cart->line_items as $key => $line) {
                $new_line = \App\Models\LineItem::create(['order_id'=>$check->id, 'product_id'=>$line->product_id, 'qty'=>$line->qty]);
            }

        	event( new \App\Events\ServerCreated("Новый заказ!", $check->id) );

            $subscribe_users = \App\Models\User::all();

            // dd($subscribe_users);

            
                foreach ($subscribe_users as $key2 ) {
                     // $new_line = \App\Models\LineItem::find('cart_id',$cart->id);

                    if ($key2['subscribe']==1) {
                        // $toq = $key2->email;
                        # code...
                       //  Mail::send('email',
                       //     array(
                       //         'contact' => $key2['email'],
                       //         'mes' => "Новый заказ!", $check->id
                       //     ), function($sendm)
                       // {
                       //     $sendm->from('mltefive@gmail.com');
                       //     $sendm->to($toq, '')->subject('Новый заказ! ');
                       // });

      //$data = array('contact'=>"Virat Gandhi",'mes'=>"Virat mesmesmes Gandhi", 'order' => $check);
                        $to = $key2['email'];
                        $contactName = $key2['name'];
                        $contactEmail = $key2['email'];
                        $data = array('order' => $check, 'to' => $to, 'email'=>$contactEmail);
                          // Mail::send(['text'=>'order_email'], $data, function($message, $tto=$data) {
                        Mail::send(['text'=>'order_email'], $data, function($message) use ($contactEmail, $contactName) {
                            $message->to($contactEmail, $contactName)->subject('Заказ');
                            $message->from('mltefive@gmail.com','Сайт');
                        });



      //echo "Basic Email Sent. Check your inbox.";

              //          var_dump($key2['subscribe']);
            //            var_dump($key2['email']);

                    }
                    // dd($key2['email']);
                    // Mail::to($key2->email)->queue('Новый заказ');

                    // $contact = $request->all()['your-contact'];
                    // $mes = $request->all()['your-message'];

                    
                }
            

    	    // $cart->delete();

            $cart->delete();


        	return view('mcf_v2.thanks')
                        ->with('order_id', $check->id)
                        ->with('status', $this->status)
                        ->with('pay_types', $this->pay_types)
                        ->with('pay_places', $this->pay_places);
		
    	}
        else {
        	return 'null';
        }
		        // if ($cart->line_items) {
		        	
				if (!isset($cart->line_items)){

		        // 	# code..

		        // }
		        	// return view('menu3.thanks')->with('order_id', $cart->line_items);

				// $article = Cart::findOrFail($id);
				// $article->delete();

		        // $order = App\Models\Order::create(['cart_id'=>$cart->id, 'status'=>'new', 'pay_type'=>"", 'adr'=>'adr', 'phone'=>])
		        
		        // $params = array('');
		        // return $cart->checkout($cart);

		        // return view('carts.index')
		            // ->with('carts', $carts);
		    	}
		    	// else 
		    	// {
		    	// 	return 'error нет позиций';
		    	// }


    		}


	}
      


}
