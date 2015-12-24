
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
                        <li><a href="index.html">Home</a></li>
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
                            <a href="{{url('store/view/'.$product->id)}}">{{$product->name}}</a>
                            <!-- Para -->
                            <p>{{$product->description}}</p>
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
                </ul>

                <!-- Product details -->

                <div class="product-main">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- Image. Flex slider -->
                            <div class="product-slider">
                                <div class="product-image-slider flexslider">

                                    <img id="imageToSwap" src="{{asset($products->image)}}"  />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- Title -->
                            <h4 class="title">{{ $products->name }}</h4>
                            <h5>Price : RM{{ $products->price }}</h5>


                            <p>Availability : In Stock</p>
                            <!-- Dropdown menu -->
                            <div class="form-group">

                                {!! Form::open(array('url' => 'foo/bar')) !!}
                                {!! Form::label('Option :') !!}<br />
                                {!! Form::select('product_id',([$products->image => 'Normal'] + $options),null,['class' => 'form-control', 'id' => 'dlist', 'onChange' => 'swapImage()']) !!}



                                {!! Form::close() !!}
                                <script type="text/javascript">
                                    function swapImage(){
                                        var image = document.getElementById("imageToSwap");
                                        var dropd = document.getElementById("dlist");
                                        image.src = "{{asset('')}}" + dropd.value;
                                    };
                                </script>
                                </div>

                            <!-- Quantity and add to cart button -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        @if($errors->any())
                                            <ul class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        {!! Form::open(array('url' => 'products')) !!}
                                        <input type="text" class="form-control input-sm" name="qty">
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
@stop