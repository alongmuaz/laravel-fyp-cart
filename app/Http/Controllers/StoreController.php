<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaymentProof;
use App\Product;
use App\Category;
use App\Contact;
use App\Gambar;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Request;
use App\Transaction;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Customer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Collective;

class StoreController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function getIndex()
    {
        $id = Input::get('id');
        return redirect('/');
    }


    public function index1()
    {
        return view('store.index');
    }
    public function getContact()
    {
        return view('store.contact')->with('contacts',Contact::all());
    }

    public function postContact(Requests\ContactRequest $request)
    {
        $input = array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'comment' => Input::get('comment'),
            'date'      => Carbon::now('Asia/Kuala_Lumpur'),
        );
        Contact::create($input);

        return redirect('store/msgthankyou');
    }

    public function getMsgthankyou()
    {
        return view('store.msgthankyou');
    }

    public function getView($id)
    {
        return view('store.show')->with('products', Product::find($id))->with('options', Gambar::where('product_id','=',$id)->get());
    }

    public function getCategory($cat_id)
    {
        $cat = Category::all();
        $db = Product::take(6)->Where('status', 1)->orderBy('created_at', 'ASC')->get();
        return view('store.item',compact('cat','db'))->with('products', Product::where('category_id','=', $cat_id)->paginate(2))->with('categories',Category::find($cat_id));
    }

    public function postCart(Requests\CartRequest $request)
    {
        $products = Product::find(Input::get('id'));;
        if(Input::get('qty') > 10 ) {
            return redirect ('store/view/'.$products->id)->with('flash_message','Limit 10 Only');
        }

        $id = $products->id;
        $name = $products->title;
        $cat = $products->category_id;
        $qty = Input::get('qty');
        $color = Gambar::find(Input::get('color'));
        $size = Input::get('size');
        $price = $products->price;
        $profit = ($products->profit * 0.06);
        $img = Gambar::find(Input::get('color'));

        $data = array('id' => $id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price,
            'profit' => $profit,
            'options' => array(
                'size' 	=> $size,
                'image'	=> $img->img,
                'color'	=> $color->name,
                'img_id' => $img->id,
                'cat'   => $cat,
            ));

        Cart::add($data);
        return redirect('store/cart');
    }

    public function getCart()
    {
        return view('store.content');
    }

    public function postUpdate()
    {
        $rowId = Input::get('rowid');
        $qty = Input::get('qty-n');
        Cart::update($rowId, $qty);
        return redirect('store/cart');
    }

    public function getDelete($id)
    {
        Cart::remove($id);
        return redirect('store/cart');
    }

    public function getCheckout()
    {
        if(Session::has('values')) {
            return redirect ('store/payment');
        }
        return view ('store/checkout')->with('values',Session::get('values'));
    }

    public function postPayment(Requests\CheckoutRequest $request)
    {

        $input = array(
            'name'              => Input::get('name'),
            'email'             => Input::get('email'),
            'no_tel'            => Input::get('no_tel'),
            'address'           => Input::get('address'),
            'city'              => Input::get('city'),
            'poscode'           => Input::get('poscode'),
            'state'             => Input::get('state')
        );

        Session::put('values', $input);

        return redirect ('store/payment');
    }
    public function getTest()
    {
        return view('a.payment2')->with('form');
    }
    public function getPayment()
    {
        if(Session::has('values')) {
            return view ('store.payment')->with('form');
        }
        return redirect ('store/checkout');
    }

    public function postCheckoutbaru(Requests\CheckoutPaymentRequest $request)
    {
        $input = Session::get('values');
        $customer = Customer::create($input);

        $tos = Cart::tos();
        $total =  Cart::total();

        $od = array(
            'order_date'        => Carbon::now('Asia/Kuala_Lumpur'),
            'total_tax'         => $tos,
            'total_purchase'    => $total,
            'order_status'      => 0,
            'customer_id'       => $customer->id,
        );

        $order = Order::create($od);

        $pp = array(
            'order_id' => $order->id,
            'time'      => Input::get('time'),
            'date'      => Input::get('date'),
            'ref_no'    => Input::get('ref_no'),
            'amount'    => Input::get('amount'),
            'pref_bank' => Input::get('pref_bank'),
            'method'    => Input::get('method'),
        );
        $ppr = PaymentProof::create($pp);

        $formid = str_random();
        $cart_content = Cart::content();

        foreach ($cart_content as $cart) {
            $tr = array(
                'product_id' 	=> $cart->id,
                'form_id' 		=> $formid,
                'qty'			=> $cart->qty,
                'total_price'	=> $cart->subtotal,
                'order_id'		=> $order->id,
                'gambar_id'		=> $cart->options->img_id,
                'color'			=> $cart->options->color,
                'size'			=> $cart->options->size,
                'category_id'	=> $cart->options->cat,
                'month'         => Carbon::now('Asia/Kuala_Lumpur'),

            );

            Transaction::create($tr);
        }

        $data = array(
            'name' => $customer->name,
            'email' => $customer->email,
            'no_tel' => $customer->no_tel,
            'date'  => Carbon::now('Asia/Kuala_Lumpur'),
        );



        Mail::send('emails.invoice', $data, function ($message) {
            $input = Session::get('values');
            $message->from('admin@mapdip5b.com', 'Sales');

            $message->to($input['email'], $input['name'])->subject('Your Order Has Been Received');

        });

        Session::forget('values');
        Cart::destroy();

        return redirect('store/thankyou/');
    }

    public function postCheckout()
    {

        $tos = Cart::tos();
        $total =  Cart::total();

        $input = array(
            'order_date'        => date('Y-m-d H:i:s'),
            'total_tax'         => $tos,
            'total_purchase'    => $total,
            'order_status'      => 'pending',
            'name'              => Input::get('name'),
            'email'             => Input::get('email'),
            'no_tel'            => Input::get('no_tel'),
            'address'           => Input::get('address'),
            'city'              => Input::get('city'),
            'poskod'              => Input::get('poskod'),
            'state'             => Input::get('state'),
           );

        $order = Order::create($input);

        $formid = str_random();
        $cart_content = Cart::content();

        foreach ($cart_content as $cart) {

            $transaction = new Transaction();

            $transaction->product_id = $cart->id;
            $transaction->form_id = $formid;
            $transaction->qty = $cart->qty;
            $transaction->total_price = $cart->subtotal;
            $transaction->order_id = $order->id;
            $transaction->gambar_id = $cart->options->img_id;
            $transaction->color = $cart->options->color;
            $transaction->size = $cart->options->size;
            $transaction->category_id = $cart->options->cat;

            $transaction->save();
        }
    $ttr = Transaction::where('order_id','=',$order->id);



        Cart::destroy();
        Session::forget('values');
        return redirect('store/thankyou/');
    }


    public function getSearch() {
        $keyword = Input::get('keyword');
        return view('store.search')
    ->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())->with('keyword', $keyword);
}

    public function getThankyou()
    {
        return view('store.thankyou');
    }

    public function getWel()
    {

        $data = array(
            'name' => 'Muaz',
            'email'=> 'muhdmuax@gmail.com',

        );
        Mail::send('emails.invoice', $data, function($message) use($pdf)
        {
            $message->from('admin@mapdip5b.com', '');

            $message->to('muhdmuax@gmail.com')->subject('Invoice');
        });

     return view('welcome');
    }
}
