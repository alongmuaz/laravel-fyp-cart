@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Settings</span>
            </div>
        </div>
        <div class="portlet-body form">
        {!! Form::model($settings,array('url' => 'admin/settings/update/'.$settings->id)) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('about_title', 'About Title:') !!}
                        {!! Form::text('about_title',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('about', 'About Us:') !!}
                        {!! Form::textarea('about',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('site_title', 'Site Title:') !!}
                {!! Form::text('site_title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('site_keyword', 'Site Keyword:') !!}
                {!! Form::text('site_keyword',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('site_description', 'Site Description :') !!}
                {!! Form::text('site_description',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Address :') !!}
                {!! Form::text('address',null,['class'=>'form-control']) !!}
            </div>

                </div>
            </div>
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       {!! Form::label('company_name', 'Company Name:') !!}
                       {!! Form::text('company_name',null,['class'=>'form-control']) !!}
                   </div>
                   </div>
               <div class="col-md-6">
                   <div class="form-group">
                       {!! Form::label('compnay_regno', 'Company Reg No:') !!}
                       {!! Form::text('company_regno',null,['class'=>'form-control']) !!}
                   </div>
                   </div>
               </div>
           </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn blue']) !!}
            </div>
        {!! Form::close() !!}
</div>
        <hr/>

    </div>
@stop
@section('title')
    General Settings
@stop
@section('subtitle')
    Site Settings
@stop