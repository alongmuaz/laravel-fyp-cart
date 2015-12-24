<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Gambar;
use Illuminate\Http\Request;

class StoreController extends Controller {

    public function index()
    {
        return view('store.index')->with('products', Product::take(12)->orderBy('created_at', 'DESC')->get());
    }

    public function getView($id)
    {
        return view('store.show')->with('products', Product::find($id))->with('categories',Category::all())->with('db',Product::all())->with('options', Gambar::where('product_id','=',$id)->lists('name', 'img'));
    }

    public function getCategory($cat_id)
    {
        $cat = Category::all();
        $db = Product::all();
        return view('store.item',compact('cat','db'))->with('products', Product::where('category_id','=', $cat_id)->paginate(2))->with('categories',Category::find($cat_id));
    }

}
