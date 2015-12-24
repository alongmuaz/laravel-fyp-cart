<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaymentProof;
use App\Permission;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
use DB;
use App\Role;
use Illuminate\Database\Query\JoinClause;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function getChart1()
    {
        $kato = Category::whereHas('transaction', function($query) {
            $query->orderBy('qty','DESC');
            $query->where('qty', '>', 0);
            $query->where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfYear());
            // $query->groupBy('created_at');

        })->get();


        $orderall = Category::whereHas('transaction', function($query) {
            $query->where('qty', '>', 0);
            $query->where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfYear());
            $query->orderBy('created_at','ASC');
            // $query->groupBy('created_at');

        })->get();


        $cats = Transaction::where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfYear())->groupBy('category_id')->get();
        $bulan = Transaction::groupBy(DB::raw('MONTH(month)') )->get();



        $orderall2 = Transaction::distinct('category_id');

        return view('a.chart1',compact('kato','orderall','orderall2','cats','bulan'));//->with('name',$kato->lists('name'));
    }

    public function getChart()
    {

        $cat = Category::all();
       // $total = Transaction::where('category_id','=',$cat->id)->orderBy('created_at', 'desc')->limit(1)->get();
        $kato = Category::all();
        $trans = Transaction::all();

        $produk = Product::all();


        $tro = Transaction::groupby('id')->get();
        $top = Transaction::orderBy('qty','desc')->limit(5)->get();
        $topcat = Transaction::orderBy('qty','desc')->groupBy('category_id')->limit(5)->get();

        return view('a.chart')->with('kato',$kato)->with('tro',$tro)->with('trans',$trans)->with('produk',$produk)
            ->with('orders',Order::all())->with('tops',$top)->with('topcats',$topcat);
    }


    public function getIndex()
    {
        $now = Carbon::now('Asia/Kuala_Lumpur');
        $monthStart = $now->startOfMonth();
        $monthEnd = $now->endOfMonth();
        $tempahan = Order::orderBy('created_at',$monthStart);
        // where('created_at', '>=', Carbon::now()->startOfMonth())->get()
        $kato = Category::whereHas('transaction', function($query) {
            $query->where('qty', '>', 0);
            $query->where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfYear());
        })->get();

        $katoo = Category::whereHas('transaction', function($query) {
            $query->where('qty', '>', 0);
            $query->where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfMonth());
        })->get();

        $overall = Transaction::select('id','created_at','month',DB::raw('sum(qty) as total'))
            ->groupBy(DB::raw('MONTH(month)') )
            ->orderBy('created_at','asc')
            ->where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfYear())->get();

        $testo = Transaction::select('id','month')->groupBy(DB::raw('MONTH(month)') )
            ->orderBy('month','asc');

$tahun = Carbon::now('Asia/Kuala_Lumpur')->startOfYear();
        $tran = Transaction::all();
        $tops = Transaction::orderBy('qty','desc')->groupBy('product_id')->limit(5)->where('created_at', '>=', Carbon::now('Asia/Kuala_Lumpur')->startOfWeek())->get();
        return view('a.index',compact('kato','katoo','tops','overall','tahun','testo'))->with('tempahan',$tempahan)->with('trans',$tran)->with('args',Order::all())->with('ris',Order::sum('total_purchase'))
            ->with('name',$kato->lists('name'))
            ->with('namo',$katoo->lists('name'));
    }


    public function getView($id)
    {
        $transactions = Transaction::where('order_id','=',$id);
         return view('a.orderview',compact('transactions'))->with('customers',Customer::find($id))->with('orders',Order::find($id))->with('payments',PaymentProof::where('order_id','=',$id)->get());
    //$customers = Customer::find($id);
        //return view('a.orderview',compact('customers'));
    }

    public function postDelete($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect('admin/')->with('flash_message', 'Order dihapuskan');
        }
        return redirect('admin/')->with('flash_message', 'Something went wrong , please try again');

    }

    public function postProcess($id)
    {
        $order=Order::find($id);
        $tr =  Input::get('order_status');
        $order->order_status = $tr;
        $order->save();

        if($tr == 0) {
            return redirect ('admin/view/'.$order->id)->with('flash_message','Nothing Change');
        }

        elseif($tr == 1) {

            $order= Order::find($id);
            $data = array(
                'name' => $order->customer->name,
                'email' => $order->customer->email,
                'no_tel' => $order->customer->no_tel,
                'date'  => Carbon::now('Asia/Kuala_Lumpur'),
                'remark' => Input::get('remark'),
                'subject' => 'Your Payment Has Been Accepted',
            );

            Mail::queue(['html' => 'emails.invoice2'], $data, function ($message) use ($data) {
                $message->from('admin@mapdip5b.com', 'Sales');

                $message->to($data['email'], $data['name'])->subject($data['name'],$data['subject']);

            });

        }

        elseif ($tr == 2) {

            $order= Order::find($id);
            $data = array(
                'name' => $order->customer->name,
                'email' => $order->customer->email,
                'no_tel' => $order->customer->no_tel,
                'date'  => Carbon::now('Asia/Kuala_Lumpur'),
                'remark' => Input::get('remark'),
            );

            Mail::queue(['html' => 'emails.invoice2'], $data, function ($message) use ($data) {
                $message->from('admin@mapdip5b.com', 'Sales');

                $message->to($data['email'], $data['name'])->subject('Your Order Has Been Completed');

            });

        }

       return redirect ('admin/view/'.$order->id)->with('flash_message','Order Status Updated');

    }

    public function getUser()
    {
        if (\Entrust::hasRole('Admin')) {
            return view('a.user')->with('rolls',Role::all());
        }
        return redirect ('admin')->with('flash_message','You dont have permission to add user');
    }

    public function postUsercreate()
    {
        $input = array(
            'name' => Input::get('name'),
            'display_name' => Input::get('dis_name'),
            'description'   => Input::get('description')
        );

        Role::create($input);


        return redirect('admin/user')->with('flash_message','User createded success');

    }

    public function postPermission()
    {

        $input = array(
            'name' => Input::get('name'),
            'display_name' => Input::get('dis_name'),
            'description'   => Input::get('description')
        );

        $a = Permission::create($input);

        return redirect('admin/user')->with('flash_message','User roles updated');
    }
}
