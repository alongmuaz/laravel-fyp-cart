<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Order;
use Request;
use App\Product;
class CategoryController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
        return redirect('admin/categories/view');
    }

    public function getView()
    {
        return view('a.categories')->with('categories',Category::paginate(2));
    }
    public function postCreate(Requests\CategoryRequest $request)
    {
        $input = Request::all();
        Category::create($input);
        return redirect('admin/categories/create')->with('flash_message','Category created ');
    }

    public function getCreate()
    {

        if (\Entrust::hasRole('Admin')) {
            return view('a.categoriescreate');

            }
        return redirect('admin')->with('flash_message','You dont have permission to create categories');
    }

    public function postDestroy($id)
    {

        if (\Entrust::hasRole('Admin')) {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                return redirect('admin/categories/view')->with('flash_message', 'Category deleted');
            }

        } return redirect('admin/categories/view')->with('flash_message','You unable to delete categories due to Demo account');

    }

    public function getDetails($cat_id)
    {
        $cat = Category::all();
        return view('a.cat')->with('products', Product::where('category_id','=', $cat_id)->paginate(8))->with('categories',Category::find($cat_id));
    }


}
