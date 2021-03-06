
@extends('shop')
@section('content')

        <!-- Items -->
<div class="items">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3 col-sm-3 hidden-xs">

                <h5 class="title">Categories</h5>
                <!-- Sidebar navigation -->
                <nav>
                    <ul id="nav">
                        <!-- Main menu. Use the class "has_sub" to "li" tag if it has submenu. -->
                        @foreach($categories as $cat)
                            <li><a href="{{url('items/'.$cat->id)}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                </nav>
                <br />
                <!-- Sidebar items (featured items)-->

                <div class="sidebar-items">

                    <h5 class="title">Featured Items</h5>

                    <!-- Item #1 -->
                    <div class="sitem">
                        @foreach($db as $product)
                                <!-- Don't forget the class "onethree-left" and "onethree-right" -->
                        <div class="onethree-left">
                            <!-- Image -->
                            <a href="single-item.html"><img src="{{asset('img/'.$product->img.'.png')}}" alt="" /></a>
                        </div>
                        <div class="onethree-right">
                            <!-- Title -->
                            <a href="single-item.html">{{$product->name}}</a>
                            <!-- Para -->
                            <p>{{$product->info}}</p>
                            <!-- Price -->
                            <p class="bold">RM{{$product->price}}</p>
                        </div>
                        <div class="clearfix"></div>
                        @endforeach
                    </div>

                </div>

            </div>

            <!-- Main content -->

            <!-- Main content -->
            <div class="col-md-9 col-sm-9">

                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="items.html">Smartphone</a></li>
                    <li class="active">Apple</li>
                </ul>

                <!-- Title -->
                <h4 class="pull-left">{{$category->name}}</h4>




                <div class="clearfix"></div>

                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="item">
                                <!-- Item image -->
                                <div class="item-image">
                                    <a href=""><img src="{{asset('img/'.$product->img.'.png')}}" alt="" /></a>
                                </div>
                                <!-- Item details -->
                                <div class="item-details">
                                    <!-- Name -->
                                    <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
                                    <h5><a href="{{url('shop',$product->id)}}" >{{ $product->name }} </a><br><span class="ico"><img src="s/img/hot.png" alt="" /></span></h5>
                                    <div class="clearfix"></div>
                                    <!-- Para. Note more than 2 lines. -->
                                    <p>{{$product->description}}.</p>
                                    <hr />
                                    <!-- Price -->
                                    <div class="item-price pull-left">RM{{$product->price}}</div>
                                    <!-- Add to cart -->
                                    <div class="button pull-right"><a href="/products/{{$product->id}}">View Item</a></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

@section('pagination')
                    <div class="col-md-9 col-sm-9">
                        <!-- Pagination -->
                        <div class="paging">
                           {{$products->render()}}
                        </div>
                    </div>

                </div>
                @stop


            </div>



        </div>
    </div>
</div>
<br>
@include('shop.newsletter')
@stop