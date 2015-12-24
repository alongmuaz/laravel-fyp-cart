@extends('shop')
@section('content')
        <!-- Page heading starts -->

<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Contact Us</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading ends -->

<!-- Page content starts -->

<div class="content contact-two">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
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
                <!-- Contact form -->
                <h4 class="title">Contact Form</h4>
                <div class="form">
                    <!-- Contact form (not working)-->
                        {!! Form::model($contacts,array('url' => 'store/contact', 'class' => 'form-horizontal')) !!}
                    <div class="form-group">
                        <label class="control-label col-md-2" for="name1">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label class="control-label col-md-2" for="email1">Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- Comment -->
                    <div class="form-group">
                        <label class="control-label col-md-2" for="comment">Comment</label>
                        <div class="col-md-9">
                            {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {!! Recaptcha::render() !!}
<br>
                    <!-- Buttons -->
                    <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-md-9 col-md-offset-2">
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                    </div>
                        {!! Form::close() !!}
                        <!-- Name -->


                </div>
                <hr />
                <div class="center">
                    <!-- Social media icons -->
                    <strong>Get in touch:</strong>
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest pinterest"></i></a>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h4 class="title">Google Map</h4>
                <!-- Google maps -->
                <div class="gmap">
                    <!-- Google Maps. Replace the below iframe with your Google Maps embed code -->
                    <iframe height="200" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15885.31254194413!2d100.425671!3d5.518227!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x222b5d94b99d74bb!2sABC+Silkscreen+Works!5e0!3m2!1sen!2s!4v1444496778689" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <hr />
                <!-- Address section -->
                <h4 class="title">Address</h4>
                <div class="address">
                    <address>
                        <!-- Company name -->
                        <strong>ABC SilkScreen Works.</strong><br>
                        <!-- Address -->
                        Jalan Perak<br>
                        13200 Kepala Batas, Pulau Pinang, Malaysia<br>
                        <!-- Phone number -->
                        <abbr title="Phone">P:</abbr> +60 17-502 1487
                    </address>
                </div>
            </div>

        </div>
    </div>
</div>

@stop