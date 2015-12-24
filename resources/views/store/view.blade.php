
@extends('shop')
@section('content')

        <!-- Items -->
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
                        <!-- Don't forget the class "onethree-left" and "onethree-right" -->
                        <div class="onethree-left">
                            <!-- Image -->
                            <a href="single-item.html"><img src="img/photos/2.png" alt="" /></a>
                        </div>
                        <div class="onethree-right">
                            <!-- Title -->
                            <a href="single-item.html">HTC One V</a>
                            <!-- Para -->
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <!-- Price -->
                            <p class="bold">$199</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="sitem">
                        <div class="onethree-left">
                            <a href="single-item.html"><img src="img/photos/3.png" alt="" /></a>
                        </div>
                        <div class="onethree-right">
                            <a href="single-item.html">Sony One V</a>
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <p class="bold">$399</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="sitem">
                        <div class="onethree-left">
                            <a href="single-item.html"><img src="img/photos/4.png" alt="" /></a>
                        </div>
                        <div class="onethree-right">
                            <a href="single-item.html">Nokia One V</a>
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <p class="bold">$159</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="sitem">
                        <div class="onethree-left">
                            <a href="single-item.html"><img src="img/photos/5.png" alt="" /></a>
                        </div>
                        <div class="onethree-right">
                            <a href="single-item.html">Samsung One V</a>
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <p class="bold">$299</p>
                        </div>
                        <div class="clearfix"></div>
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
                                    <img id="imageToSwap" src="{{asset('img/'.$products->img.'.png')}}"  />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- Title -->
                            <h4 class="title">{{ $products->name }}</h4>
                            <h5>Price : ${{ $products->price }}</h5>


                            <p>Availability : In Stock</p>
                            <!-- Dropdown menu -->
                            <div class="form-group">

                                <select id="dlist" onChange="swapImage()" class="form-control">
                                    <option value="{{asset('img/'.$products->img.'.png')}}">Contoh 1</option>
                                    <option value="{{asset('img/'.$products->img.'.png')}}">Contoh 2</option>
                                    <option value="{{asset('img/'.$products->img.'.png')}}">Contoh 3</option>
                                </select>
                                <script type="text/javascript">
                                    function swapImage(){
                                        var image = document.getElementById("imageToSwap");
                                        var dropd = document.getElementById("dlist");
                                        image.src = dropd.value;
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
@stop