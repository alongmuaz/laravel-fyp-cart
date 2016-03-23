<!-- Footer starts -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget">
                            <h5>Contact</h5>
                            <hr />
                            <div class="social">
                                <a href="{{url('http://www.facebook.com/weprint4u')}}"><i class="fa fa-facebook facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus google-plus"></i></a>
                            </div>
                            <hr />
                            <i class="fa fa-home"></i> &nbsp; Kepala Batas, Penang
                            <hr />
                            <i class="fa fa-phone"></i> &nbsp; +60-148422783
                            <hr />
                            <i class="fa fa-envelope-o"></i> &nbsp; info@abcsilk.com
                            <hr />
                            <div class="payment-icons">
                                <img src="{{asset('s/img/payment/americanexpress.gif')}}" alt="" />
                                <img src="{{asset('s/img/payment/visa.gif')}}" alt="" />
                                <img src="{{asset('s/img/payment/mastercard.gif')}}" alt="" />
                                <img src="{{asset('s/img/payment/discover.gif')}}" alt="" />
                                <img src="{{asset('s/img/payment/paypal.gif')}}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h5>About Us</h5>
                            <hr />
                            <p>@if (count($settings) > 0) {{$settings->about}} @endif</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h5>Other Links</h5>
                            <hr />
                            <div class="two-col">
                                <div class="col-left">
                                    <ul>
                                        <li><a href="#">Portfolio</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                        <li><a href="#">Blog</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <!-- Copyright info -->
                <p class="copy">Copyright &copy; 2015 | <a href="{{url("/")}}">ABC SilkScreen Works</a> - <a href="{{url("/")}}">Home</a> |  <a href="#">Service</a> | <a href="{{url("/store/contact")}}">Contact Us</a></p>
                Powered by <a href="http://muaz.xyz" target="_blank">Muhammad Mu'az</a>, <a href="https://www.facebook.com/amirul.h.azahar?fref=ts">Amirul Helmi</a>, <a href="https://www.facebook.com/preven.kumar?fref=ts">Preven Kumar</a>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>
<!--/ Footer ends -->