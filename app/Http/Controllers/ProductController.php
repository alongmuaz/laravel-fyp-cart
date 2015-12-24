<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Facade;
use Storage;
use League\Flysystem\Filesystem;
use File;
use Illuminate\Html;
use App\Gambar;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
        return redirect('admin/products/view');
    }

    public function getView()
    {
        $products = Product::paginate(10);
        $catos = Category::all();
        return view('a.products')->with('products', $products)->with('catos', $catos)->with('cato', Category::lists('name', 'id'));
    }

    public function getCreate()
    {
        if (\Entrust::hasRole('Admin')) {
            if(Category::count()) {
                return view('a.productscreate')->with('cato', Category::lists('name', 'id'))->with('products', Product::all());
            }

            else {
                return redirect ('admin/categories/view');
            }
        }

        return redirect('admin')->with('flash_message','You dont have permission to access create product page');


    }

    public function getUpdate($id)
    {
        $product = Product::find($id);
        return view ('a.productupdate',compact('product'))->with('cato', Category::lists('name', 'id'))->with('products', Product::all());;
    }

    public function postUpdatepro($id)
    {
        $product=Product::find($id);
        if ($product) {
        $product->category_id = Input::get('category_id');
        $product->title = Input::get('title');
        $product->info = Input::get('info');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->profit = Input::get('profit');
        $product->status = Input::get('status');
            $product->update();
            return redirect('admin/products/update/'.$id)->with('flash_message', 'Product updated');
        } return redirect('admin/products/update/'.$id)->with('flash_message', 'Something were wrong');

    }

    public function postCreate(Requests\ProductCreateRequest $request)
    {
        if (\Entrust::hasRole('Admin')) {

            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->info = Input::get('info');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->profit = Input::get('profit');
            $product->status = Input::get('status');
            $product->type = Input::get('type');

            $image = Input::file('image');
            $filename = date('m-d-Y-H_i_s') . "-" . $image->getClientOriginalName();
            $path = public_path('img/products/' . $filename);
            // $ratio = 16/9;
            // $image = Image::make($image->getRealPath());
            // $image->fit($image->width(), intval($image->width() / $ratio))->save($path);;

            Image::make($image->getRealPath())->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
            $product->image = 'img/products/' . $filename;
            $product->save();
            return redirect('admin/products/extra/'.$product->id)->with('flash_message', 'Product created');
        }
        return redirect('admin/products/extra');

    }

    public function postDestroy($id)
    {
        if (\Entrust::hasRole('Admin')) {
            $product = Product::find($id);
            if ($product) {
                File::delete(public_path($product->image));
                $product->delete();
                return redirect('admin/products/view')->with('flash_message', 'Produk dihapuskan');
            }
            return redirect('admin/products/view')->with('flash_message', 'Something went wrong , please try again');
        } return redirect('admin/products/view')->with('flash_message','You unable to delete product due demo account');
    }

    public function postStatus($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->status = Input::get('status');
            $product->save();
            return redirect('admin/products/view')->with('flash_message', 'Product Updated');
        }
        return redirect('admin/products/view')->with('flash_message', 'Invalid Product');
    }

    public function getExtra($id)
    {
        return view('a.productsextra')->with('products', Product::find($id))->with('images', Gambar::where('product_id', '=', $id)->get());
    }

    public function postExtra($id)
    {
        $products = Product::all();
        $gambar = new Gambar;
        $gambar->name = Input::get('name');
        $gambar->product_id = $id;

        $image = Input::file('image');
        $filename = date('m-d-Y-H_i_s') . "-" . $image->getClientOriginalName();
        $path = public_path('img/products/extra/' . $filename);

        Image::make($image->getRealPath())->resize(250, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        $gambar->img = 'img/products/extra/' . $filename;
        $gambar->save();
        return redirect()->action('ProductController@getExtra', [$id])->with('flash_message', 'Image Added');
    }

    public function postExtradestroy($id)
    {
        $gambar = Gambar::find($id);
        if (\Entrust::hasRole('Admin')) {
            $gambar = Gambar::find($id);
            if ($gambar) {
                File::delete(public_path($gambar->img));
                $gambar->delete();
                return redirect()->action('ProductController@getExtra', [$gambar->product_id])->with('flash_message', 'Product deleted');
            }
            return redirect()->action('ProductController@getExtra', [$gambar->product_id])->with('flash_message', 'Something went wrong , please try again');
        } return redirect ('admin/products/extra/'.$gambar->product_id)->with('flash_message','You unable to destroy product extra image');
    }
}


