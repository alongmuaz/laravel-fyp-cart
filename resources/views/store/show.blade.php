
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
                        <li><a href="/">Home</a></li>
                        @foreach($categories as $cat)
                            <li><a href="{{url('store/category',$cat->id)}}">{{$cat->name}}</a>
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

                <!-- Breadcrumbs -->
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('store/category/'.$products->category->id)}}">{{$products->category->name}}</a></li>
                </ul>

                <!-- Product details -->

                <div class="product-main">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- Image. Flex slider -->
                            <div class="product-slider">
                                <div class="product-image-slider flexslider">
                                    <ul class="slides">
                                        <!-- Each slide should be enclosed inside li tag. -->

                                        <!-- Slide #1 -->
                                        @foreach($options as $option)
                                        <li>
                                            <!-- Image -->
                                            <img src="{{asset($option->img)}}" alt=""/>
                                        </li>


@endforeach


                                        <!-- Slide #2 -->


                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- Title -->
                            <h4 class="title">{{ $products->title }}</h4>
                            <h5>Price : RM{{ $products->price }}</h5>


                            <p>Availability : In Stock</p>
                            <!-- Dropdown menu -->
                            @if($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! Form::open(array('url' => 'store/cart')) !!}
                            <div class="form-group">
                                <select class="form-control" name="color">
                                    <option disabled>Select Color</option>
                                    @foreach($options as $option)
                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="size">
                                    <option disabled>Select Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <!-- Quantity and add to cart button -->
                            <div class="row">
                                @if(Session::has('flash_message'))
                                    <div class="Metronic-alerts alert alert-warning fade in">
                                        <strong>{{Session::get('flash_message')}}</strong>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="input-group">
                                            <div class="input-group">
                                        <input type="text" class="form-control input-sm" name="qty" placeholder="Qty">
                                        {!! Form::hidden('id',$products->id) !!}
                                        <span class="input-group-btn">
                                            {!! Form::submit('Add To Cart', ['class' => 'btn btn-default btn-sm']) !!}
                                        </span>
                                        {!! Form::close() !!}
                                            </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

                <br />

                <!-- Description, specs and review -->

                <ul class="nav nav-tabs">
                    <!-- Use uniqe name for "href" in below anchor tags -->
                    <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>

                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Description -->
                    <div class="tab-pane active" id="tab1">
                        <h5>{{ $products->title }}</h5>
                        <p>{{ $products->description }}</p>

                    </div>

                </div>

            </div>

        </div>



    </div>
</div>
</div>
<br>
@include('store.carousel')
@stop