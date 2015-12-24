@extends('shop')
@section('content')

    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Title with number of items in shopping kart -->
                    <h3 class="title"><i class="fa fa-shopping-cart"></i> Items in your cart [<span class="color">{{$count}}</span>]</h3>
                    <br />

                    <div class="table-responsive">
                        @if($cart_content->isEmpty())
                            <h3>You dont have any item on cart</h3>
                            <br>
                            @else
                                    <!-- Table -->
                            <table class="table table-striped tcart table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Unit Price</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                @foreach($cart_content as $cart)
                                    <tbody>
                                    <tr>
                                        <!-- Index -->
                                        <td>1</td>
                                        <!-- Product  name -->
                                        <td><a href="{{url('store/view/'.$cart->id)}}">{{$cart->name}}</a></td>
                                        <!-- Product image -->
                                        <td><a href="{{url('store/view/'.$cart->id)}}"><img src="{{asset($cart->options->image)}}" alt=""  /></a></td>
                                        <!-- Quantity with refresh and remove button -->
                                        <td class="item-input">
                                            {!! Form::open(array('url' => 'store/update','class' => 'input-group')) !!}
                                            <input type="text" value="{{ $cart->qty }}" name="qty-n" size="10" class="form-control" readonly>
                                            <input type="hidden" name="id" value="{{$cart->id}}">
                                            <input type="hidden" name="rowid" value="{{$cart->rowid}}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" alt="Put - on quantity if want to reduce"><i class="fa fa-refresh"></i></button>

                                        {!! Form::close() !!}
                                        <a href="{{ url('store/delete/'.$cart->rowid) }}" class="btn btn-danger" class="button"><i class="fa fa-times"></i></a>
                                        </span>
                                        </td>
                                        <td>{{$cart->options->size}}</td>
                                        <td>{{$cart->options->color}}</td>
                                        <!-- Unit price -->
                                        <td>RM {{$cart->price}}</td>
                                        <!-- Total cost -->
                                        <td>RM {{$total}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>RM {{$total}}</th>
                                        <th>GST : RM{{$tos}}</th>
                                    </tr>
                                    </tbody>
                            </table>
                    </div>
<h3 class="title">Step 1: Make A Payment</h3>

You are required to pay <b style=" text-decoration: underline;">RM {{$total}}</b> on one of the following account

                    <h3 class="title">Step 2 : Submit Payment Proof</h3>

Please provide your payment details in the form .
                    <!-- Button s-->
                    <div class="row">

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Checkout page title -->
                    <h4 class="title"><i class="fa fa-shopping-cart"></i> Checkout</h4>

                    <!-- Sub title -->
                    <h5 class="title">Offline Payment</h5>
                    <!-- Address and Shipping details form -->
                        @foreach($payments as $py)
                    <table class="table table-bordered table-hover table-responsive ">
                        <thead>
                        <tr>
                            <th class="bg-info" width="40%">Nama Bank</th>
                            <th width="2%">:</th>
                            <th>{{$py->name}}</th>
                        </tr>
                        <tr>
                            <th class="bg-info" width="40%">Logo</th>
                            <th width="2%">:</th>
                            <th><img src="{{asset($py->logo)}}"></th>
                        </tr>
                        <tr>
                            <th class="bg-info" width="40%">No Akaun</th>
                            <th width="2%">:</th>
                            <th>{{$py->acc_no}}</th>
                        </tr>
                        <tr>
                            <th class="bg-info" width="40%">Account Holder</th>
                            <th width="2%">:</th>
                            <th>{{$py->acc_holder}}</th>
                        </tr>
                        <tr>
                            <th class="bg-info" width="40%">Account Type</th>
                            <th width="2%">:</th>
                            <th>{{$py->acc_type}}</th>
                        </tr>
                        </thead>
                    </table>
                        @endforeach



                        <hr />
                    @if($errors->any())
                        <div id="form-errors">
                            <p>The following error has accoured:</p>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="btn btn-danger "><i class="fa fa-warning"></i>{{$error}}</li><br><br>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Payment details section -->
                        <!-- Title -->
                        <h5 class="title">Payment Details</h5>
                    <div class="form form-small">
                        <!-- Register form (not working)-->

                        {!! Form::model($form,array('url' => 'store/checkoutbaru')) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('time', 'Masa Pembayaran:',['class' => 'control-label']) !!}
                                    <input type="time" name="time" class="form-control">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('date', 'Tarikh Pembayaran :',['class' => 'control-label']) !!}
                                    {!! Form::date('date',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('ref_no', 'Nombor Rujukan:') !!}
                                    {!! Form::text('ref_no',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('amount', 'Jumlah Pembayaran:') !!}
                                    {!! Form::number('amount',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('pref_bank', 'Bank Yang Digunakan :') !!}
                                    <select id="pref_bank" name="pref_bank" class="form-control"><option value="Maybank">Maybank</option></select>

                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('method', 'Kaedah Pembayaran:') !!}
                                    <select id="method" name="method" class="form-control"><option value="Online Banking">Online Banking</option><option value="Cash Deposit">Cash Deposit</option></select>

                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="form-group pull-right">
                            {!! Form::submit('Confirm Order', ['class' => 'btn btn-danger form-control']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>


                        <hr />

                        <!-- Confirm order button -->


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('title')
    Checkout
@stop