<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Product;
use App\Category;
use App\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Transaction;
use App\Payment;
use App\Customer;
use App\Order;

class BaseController extends Controller {

    public function __construct()
    {
        View::share('pros', Product::take(8)->Where('status', 1)->orderBy('created_at', 'DESC')->get());
        View::share('customs', Product::take(8)->Where('type', 0)->orderBy('created_at', 'DESC')->get());
        View::share('products', Product::take(8)->Where('status', 1)->orderBy('created_at', 'DESC')->get());
        View::share('cus', Product::take(8)->Where('status', 1)->orderBy('created_at', 'ASC')->get());
        View::share('categories',Category::all());
        View::share('cart_content',Cart::content());
        View::share('count',Cart::count());
        View::share('total',Cart::total());
        View::share('set',Setting::find(1));
        View::share('tos',Cart::tos());
        View::share('transactions', Transaction::orderBy('created_at', 'desc')->paginate(10));
        View::share('settings',Setting::find(1));
        View::share('caty',Category::take(5)->orderBy('created_at', 'DESC')->get());
        View::share('payments', Payment::Where('status', 1)->get());
        View::share('customers',Customer::all());
        View::share('orders',Order::all());
        View::share('cat',Category::all());
        View::share('db', Product::take(6)->Where('status', 1)->orderBy('created_at', 'ASC')->get());


    }
}
