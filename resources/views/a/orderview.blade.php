@extends('a')
@section('content')
        <!-- BEGIN PAGE CONTENT INNER -->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-basket font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">
								Order  </span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-lg">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                Details </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet yellow-crusta box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Order Details
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Order #:{{$orders->id}}
                                                </div>
                                                <div class="col-md-7 value">

                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Order Date & Time:
                                                </div>
                                                <div class="col-md-7 value">
{{$orders->order_date->formatLocalized('%A %d %B %Y') }}


                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Order Status:
                                                </div>
                                                <div class="col-md-7 value">
																<span class="label label-success">
																@if($orders->order_status == 0)
                                                                    Pending
                                                                    @elseif($orders->order_status == 1)
                                                                    Processing
                                                                    @elseif($orders->order_status == 2)
                                                                    Completed
                                                                    @endif
                                                                   </span>
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Grand Total:
                                                </div>
                                                <div class="col-md-7 value">
                                                   RM {{$orders->total_purchase}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Payment Information:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$orders->payment_proof->method}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet blue-hoki box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Customer Information
                                            </div>

                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Customer Name:
                                                </div>
                                                <div class="col-md-7 value">
{{$customers->name}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Email:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$customers->email}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    State:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$customers->state}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Phone Number:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$customers->no_tel}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet red-sunglo box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Payment Proof
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Time:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$orders->payment_proof->time}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Date:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$orders->payment_proof->date}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Reference Number:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$orders->payment_proof->ref_no}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Preference Bank:
                                                </div>
                                                <div class="col-md-7 value">
                                                    {{$orders->payment_proof->pref_bank}}
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                    Amount :
                                                </div>
                                                <div class="col-md-7 value">
                                                   RM {{$orders->payment_proof->amount}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet red-sunglo box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Shipping Address
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-12 value">
                                                   {{$customers->name}} <br>
                                                    {{$customers->address}},<br>
													{{$customers->poscode}} {{$customers->city}},<br>
                                                    {{$customers->state}},<br>
                                                    Malaysia<br>
                                                    T: {{$customers->no_tel}}<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="portlet grey-cascade box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Shopping Cart
                                            </div>
                                        </div>

                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Product
                                                        </th>
                                                        <th>
                                                            Item Status
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th>
                                                            Quantity
                                                        </th>
                                                        <th>
                                                            Size
                                                        </th>
                                                        <th>
                                                            Warna
                                                        </th>
                                                        <th>
                                                            Total
                                                        </th>
                                                    </tr>
                                                    </thead>
@foreach($orders->transaction as $tr)
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                            <a href="{{url('store/view/'.$tr->product->id)}}"> {{$tr->product->title}}  </a>                                     </td>
                                                        <td>
																	<span class="label label-sm label-success">@if($tr->product->status = 1)
                                                                                                                   Available
                                                                                                                   @elseif($tr->product->status = 0)
                                                                        Out of Stock
                                                                                                                   @endif

																	</span>
                                                        </td>
                                                        <td>RM {{$tr->product->price}}</td>
                                                        <td>{{$tr->qty}}</td>
                                                        <td>{{$tr->size}}</td>
                                                        <td>{{$tr->color}}</td>
                                                        <td>RM {{$tr->total_price}}</td>
                                                    </tr>



                                                    </tbody>
@endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="well">
                                        <b>Total Purchase</b> RM {{$orders->total_purchase}}<br>
<b>Total Tax</b> RM  {{$orders->total_tax}}<br>






                                                <b>Payment Balance</b>
<br>
                                                @if(round($orders->total_purchase - $orders->payment_proof->amount) < 0)
                                                    The customer had make overpayment
                                                    @endif
<br>


                                               <b> Total Payment:</b>

                                               RM {{$orders->payment_proof->amount}}

                                        </div>
                                    </div>


                                <div class="col-md-6">
                                    <div class="well">
                                     Edit Status of Order
                                        {!! Form::model($orders,array('url' => 'admin/process/'.$orders->id,'role' => 'form')) !!}
                                        <div class="form-group">
                                            {!! Form::label('order_status', 'Order Status:',['class'=>'form-label']) !!}
                                            {!! Form::select('order_status',(['0' => 'Pending', '1' => 'Processing', '2' => 'Completed']), null,['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('remark', 'Remark Order:') !!}
                                            {!! Form::text('remark',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
</div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
@stop
@section('title')
    Order View
    @stop
@section('subtitle')
    view order details
    @stop