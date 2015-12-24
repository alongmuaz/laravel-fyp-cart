@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">View Payment Option</span>
            </div>
        </div>
        @if ($payments->isEmpty())
            <div class="alert alert-info alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>Info:</strong> No payments created yet.</div>
        @else
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover  table-condensed flip-content">
                  <thead class="flip-content">
                  <tr>
                      <th width="5%">Bil</th>
                      <th>Nama Bank</th>
                      <th>No Akaun</th>
                      <th>Account Holder Name</th>
                      <th>Account Type</th>
                      <th>Logo</th>
                      <th width="15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php $i = 1; ?>
                  @foreach($payments as $cat)
                      <tr>
                          <td>{{ $i }}</td>
                          <td>{{$cat->name}}</td>
                          <td>{{$cat->acc_no}}</td>
                          <td>{{$cat->acc_holder}}</td>
                          <td>{{$cat->acc_type}}</td>
                          <td><img src="{{asset($cat->logo)}}"></td>
                          <td>
                              {!! Form::open(['url' =>['admin/payments/destroy', $cat->id]]) !!}
                              {!! Form::hidden('id',$cat->name) !!}
                              <div class="form-group">
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                              </div>
                              {!! Form::close() !!}

                          </td>
                      </tr>
                      <?php $i++; ?>
                  @endforeach
                  </tbody>
              </table>
          </div>

        @endif
<hr/>
        <h2>Insert Payment Option</h2>
        {!! Form::open(array('url' => 'admin/payments/create', 'files' => true)) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nama Bank :') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('acc_holder', 'Account Holder Name:') !!}
            {!! Form::text('acc_holder',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('acc_no', 'Account No :') !!}
            {!! Form::text('acc_no',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('acc_type', 'Account Type :') !!}
            {!! Form::text('acc_type',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('logo', 'Logo :',['class'=>'form-label']) !!}
            {!! Form::file('logo',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Payment Option Status:',['class'=>'form-label']) !!}
            {!! Form::select('status',(['1' => 'Available','0' => 'Not Available']), null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('title')
    View payments
@stop
@section('subtitle')
    View and Delete payments
@stop