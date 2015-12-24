@extends('shop')
@section('content')

    <div class="items">
        <div class="container">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-md-3 col-sm-3 hidden-xs">

                    <h5 class="title">Categories</h5>
                    <!-- Sidebar navigation -->
                    <!-- Sidebar navigation -->
                    <nav>
                        <ul id="nav">
                            <!-- Main menu. Use the class "has_sub" to "li" tag if it has submenu. -->
                            <li><a href="/">Home</a></li>
                            @foreach($cat as $cot)
                                <li><a href="{{url('store/category',$cot->id)}}">{{$cot->name}}</a>
                                    @endforeach

                                </li>
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
                                <a href="{{url('store/view/'.$product->id)}}"><img src="{{asset($product->image)}}" alt="" /></a>
                            </div>
                            <div class="onethree-right">
                                <!-- Title -->
                                <a href="{{url('store/view/'.$product->id)}}">{{$product->title}}</a>
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
                <div class="col-md-9 col-sm-9">

                    <!-- Breadcrumb -->
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{url($categories->id)}}">{{$categories->name}}</a></li>
                    </ul>

                    <!-- Title -->
                    <h4 class="pull-left">{{$categories->name}}</h4>


                    <!-- Sorting -->

                    <div class="clearfix"></div>

                    <div class="row">
                        @foreach ($products as $product)
                        <!-- Item #1 -->
                        <div class="col-md-4 col-sm-6">
                            <!-- Each item should be enclosed in "item" class -->
                            <div class="item">
                                <!-- Item image -->
                                <div class="item-image">
                                    <a href="{{url('store/view',$product->id)}}"><img src="{{asset($product->image)}}" alt="" class="img-responsive" /></a>
                                </div>
                                <!-- Item details -->
                                <div class="item-details">
                                    <!-- Name -->
                                    <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
                                    <h5><a href="{{url('store/view',$product->id)}}">{{ $product->title }}</a><span class="ico"><img src="{{asset('s/img/hot.png')}}" alt="" /></span></h5>
                                    <div class="clearfix"></div>
                                    <!-- Para. Note more than 2 lines. -->
                                    <p>{{$product->info}}.</p>
                                    <hr />
                                    <!-- Price -->
                                    <div class="item-price pull-left">RM{{$product->price}}</div>
                                    <!-- Add to cart -->
                                    <div class="button pull-right"><a href="{{url('store/view',$product->id)}}">View Item</a></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
@endforeach


                        <div class="col-md-9 col-sm-9">
                            <!-- Pagination -->
                            <div class="paging">
                                {!! $products->render() !!}
                            </div>
                        </div>

                    </div>


                </div>



            </div>
        </div>
    </div>
    @include('store.carousel')
    @stop