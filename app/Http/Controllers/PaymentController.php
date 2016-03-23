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
use App\Payment;

class PaymentController extends BaseController {
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    public function getIndex()
    {
        return view('a.payment')->with('payments',Payment::all());
    }

    public function postCreate()
    {
        $payment = new payment;
        $payment->name = Input::get('name');
        $payment->acc_holder = Input::get('acc_holder');
        $payment->acc_no = Input::get('acc_no');
        $payment->acc_type = Input::get('acc_type');
        $payment->status = Input::get('status');

        $logo = Input::file('logo');
        $filename = date('m-d-Y-H_i_s') . "-" . $logo->getClientOriginalName();
        $path = public_path('img/payment/' . $filename);

        Image::make($logo->getRealPath())->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        $payment->logo = 'img/payment/' . $filename;
        $payment->save();
        return redirect('admin/payments')->with('flash_message', 'payment created');
    }

    public function postDestroy($id)
    {
        Payment::where('id',$id)->delete();

        return redirect ('admin/payments')->with('flash_message','Payment Option Deleted');
    }

}
