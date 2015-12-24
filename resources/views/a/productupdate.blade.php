@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Create Product</span>
            </div>
        </div>
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
        <hr/>
        <div class="portlet-body form">
            {!! Form::model($product,array('url' => 'admin/products/updatepro/'.$product->id,'role' => 'form' , 'files' => true )) !!}
            <div class="form-group">
                {!! Form::label('title', 'Product Name:',['class'=>'form-label']) !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Product Price:',['class'=>'form-label']) !!}
                {!! Form::text('price',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('info', 'Product Mini Info :',['class'=>'form-label']) !!}
                {!! Form::text('info',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Product Description:',['class'=>'form-label']) !!}
                {!! Form::textarea('description',null,['class'=>'form-control','row' => '2']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Product Status:',['class'=>'form-label']) !!}
                {!! Form::select('status',(['1' => 'In Stock','0' => 'Out of Stock']), null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('profit', 'Product Profit :',['class'=>'form-label']) !!}
                {!! Form::text('profit',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('Link Category') !!}<br />
                    {!! Form::select('category_id',(['0' => 'Select a Category'] + $cato),null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-actions">
                {!! Form::submit('Submit', ['class' => 'btn blue']) !!}
            </div>

            </form>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('title')
    Manage Products
@stop
@section('subtitle')
    Create & Delete Products
@stop