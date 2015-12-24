@extends('shop')
@section('content')
        <!-- Slider starts -->
<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
            <!-- SLIDE  -->
            <li data-transition="curtain-1" data-slotamount="7"  >
                <!-- MAIN IMAGE -->
                <img src="{{asset('s/data1/image/1.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

            </li>
            <!-- SLIDE  -->
            <li data-transition="curtain-2" data-slotamount="7"  >
                <!-- MAIN IMAGE -->
                <img src="{{asset('s/data1/image/2.jpg')}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

            </li>
            <li data-transition="curtain-2" data-slotamount="7"  >
                <!-- MAIN IMAGE -->
                <img src="{{asset('s/data1/image/3.jpg')}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

            </li>
            <li data-transition="curtain-2" data-slotamount="7"  >
                <!-- MAIN IMAGE -->
                <img src="{{asset('s/data1/image/4.jpg')}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

            </li>
            <li data-transition="curtain-2" data-slotamount="7"  >
                <!-- MAIN IMAGE -->
                <img src="{{asset('s/data1/image/5.jpg')}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

            </li>
            ....
        </ul>
    </div>
</div>
<!--/ Slider ends -->
        <!-- Items -->
<div class="items">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Latest Products</h3>
            </div>


            @foreach ($products as $product)
            <div class="col-md-3 col-sm-4">
                <div class="item">
                    <!-- Item image -->
                    <div class="item-image">
                        <a href="{{url('store/view/'.$product->id)}}"><img src="{{asset($product->image)}}" alt="" /></a>
                    </div>
                    <!-- Item details -->
                    <div class="item-details">
                        <!-- Name -->
                        <h5><a href="{{url('store',$product->id)}}" >{{ $product->title }} </a><br><span class="ico"><img src="{{asset('s/img/hot.png')}}" alt="" /></span></h5>
                        <hr />
                        <!-- Price -->
                        <div class="item-price pull-left">RM{{$product->price}}</div>
                        <!-- Add to cart -->
                        <div class="button pull-right"><a href="/store/view/{{$product->id}}">View Item</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                @endforeach

@if($customs->count())
            <div class="col-md-12">
                <h3 class="title">Custom Design</h3>
            </div>
    @endif

        </div>
    </div>
</div>
<!--/ Items end -->
@include('store.carousel')
@stop
