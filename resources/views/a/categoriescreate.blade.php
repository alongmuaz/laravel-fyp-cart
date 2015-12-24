@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Create Category</span>
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
        <div class="portlet-body form">
            {!! Form::open(array('url' => 'admin/categories/create','role' => 'form')) !!}
            <div class="form-group">
                {!! Form::label('name', 'Category Name:',['class'=>'form-label']) !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-actions">
                {!! Form::submit('Submit', ['class' => 'btn blue']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <a href="{{url('admin/categories/view')}}">View Category</a>
    </div>
@stop
@section('title')
    Manage Categories
@stop
@section('subtitle')
    Create & Delete Categories
@stop