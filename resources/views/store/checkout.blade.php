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
                            <table class="table table-striped tcart">
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
                                        <th></th>
                                        <th></th>
                                        <th>RM {{$total}}</th>
                                        <th>GST : RM{{$tos}}</th>
                                    </tr>
                                    </tbody>
                            </table>
                    </div>





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
                    <!-- Checkout page title -->
                    <h4 class="title"><i class="fa fa-shopping-cart"></i> Checkout</h4>

                    <!-- Sub title -->
                    <h5 class="title">Shipping &amp; Billing Details</h5>
                    <!-- Address and Shipping details form -->
                    <div class="form form-small">
                        <!-- Register form (not working)-->


                        {!! Form::model($values,array('url' => 'store/payment')) !!}



                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('name', 'Name :',['class' => 'control-label']) !!}

                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('email', 'Email :',['class' => 'control-label']) !!}
                                        {!! Form::email('email',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('no_tel', 'No Tel :',['class' => 'control-label']) !!}
                                    {!! Form::text('no_tel',null,['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('city', 'City :',['class' => 'control-label']) !!}
                                    {!! Form::text('city',null,['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('state', 'State :',['class' => 'control-label']) !!}
                                    <select class="form-control" id="state" name="state"><option value="Kedah">Kedah</option><option value="Kelantan">Kelantan</option><option value="Labuan">Labuan</option><option value="Melaka">Melaka</option><option value="Negeri Sembilan">Negeri Sembilan</option><option value="Pahang">Pahang</option><option value="Perak">Perak</option><option value="Perlis">Perlis</option><option value="Sabah">Sabah</option><option value="Sarawak">Sarawak</option><option value="Selangor">Selangor</option><option value="Terengganu">Terengganu</option><option value="Penang">Penang</option><option value="Kuala Lumpur">Kuala Lumpur</option></select>

                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('address', 'Address :',['class' => 'control-label']) !!}
                                    {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => '5']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('poscode', 'Poscode :',['class' => 'control-label']) !!}
                                    {!! Form::text('poscode',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        {!! Recaptcha::render() !!}

                            <div class="pull-right">
                                {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}



                    <hr />



                </div>
            </div>
        </div>
    </div>
        </div>
    @stop
@section('title')
    Checkout
    @stop