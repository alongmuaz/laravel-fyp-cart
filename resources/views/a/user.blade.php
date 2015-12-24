@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Manage User</span>
            </div>
        </div>
<h2>Create User</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
          @foreach($rolls as $roll)
              <tr>
                  <td></td>
                  <td>{{$roll->name}}</td>
                  <td>{{$roll->display_name}}</td>
                  <td>{{$roll->description}}</td>
                  <td>button</td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {!! Form::open(array('url' => 'admin/usercreate')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dis_name', 'Display Name :') !!}
            {!! Form::text('dis_name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::text('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn form-control']) !!}
        </div>
        {!! Form::close() !!}




        <hr/>

    </div>
@stop

@section('title')
    Roles
@stop
@section('subtitle')
    Manage User and Roles
@stop