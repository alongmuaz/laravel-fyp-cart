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
                                <th>Total</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>
                            @foreach($cart_content as $cart)
                            <tbody>
                            <tr>
                                <!-- Index -->
                                <td>{{ $i }}</td>
                                <!-- Product  name -->
                                <td><a href="{{url('store/view/'.$cart->id)}}">{{$cart->name}}</a></td>
                                <!-- Product image -->
                                <td><a href="{{url('store/view/'.$cart->id)}}"><img src="{{asset($cart->options->image)}}" alt=""  /></a></td>
                                <!-- Quantity with refresh and remove button -->
                                <td class="item-input">
                                    {!! Form::open(array('url' => 'store/update','class' => 'input-group')) !!}
                                    <input type="text" value="{{ $cart->qty }}" name="qty-n" size="10" class="form-control input-sm">
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
                                <td>RM {{$cart->subtotal}}</td>
                            </tr>
                            <?php $i++; ?>
@endforeach
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total RM{{$total}}</th>
                                <th>GST : RM{{$tos}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>





                    <!-- Button s-->
                    <div class="row">
                        <div class="col-md-4 col-md-offset-8">
                            <div class="pull-right">
                                <a href="{{url('/')}}" class="btn btn-default">Continue Shopping</a>
                                <a href="{{url('store/checkout')}}" class="btn btn-danger">CheckOut</a>
                            </div>
                        </div>
                        @endif
                    </div>

            </div>
        </div>
    </div>
    </div>
    @stop
@section('title')
    Cart
    @stop