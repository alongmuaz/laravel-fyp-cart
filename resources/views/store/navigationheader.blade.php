<!-- Navigation -->
<div class="navbar bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('store/contact')}}">Contact</a></li>
                <li><a href="{{url('store/cart')}}">Cart</a></li>
                @foreach($caty as $cat)
                <li><a href="{{url('store/category/'.$cat->id)}}">{{$cat->name}}</a></li>
                    @endforeach
            </ul>
        </nav>
    </div>
</div>
<!--/ Navigation End -->
