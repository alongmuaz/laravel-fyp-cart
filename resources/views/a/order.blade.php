@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Dashboard</span>
            </div>
        </div>





        <h2>Dashboard</h2>
        <hr/>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="bg-info">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>No Tel</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($transactions as $tr)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$tr->order->customer->name}}</td>
                        <td>{{$tr->order->customer->email}}</td>
                        <td>{{$tr->order->customer->no_tel}}</td>
                        <td><span class="label label-success">@if($tr->order->order_status==0)Pending
                                @elseif($tr->order->order_status == 1) Processing
                                @elseif($tr->order->order_status==2)Completed
                                @endif</span></td>
                        <td>{{$tr->order->order_date}}</td>
                        <td>
                            <button class="btn btn-xs btn-info"><a href="{{url('admin/view/'.$tr->order->customer->id)}}"><i class="fa fa-pencil"> </i> View Order</a> </button>

                            {!! Form::open(['url' =>['admin/delete', $tr->order->customer->id]]) !!}
                            <button class="btn btn-xs btn-danger">  <i class="fa fa-times"></i> {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!} </button>

                            {!! Form::close() !!}



                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach

                </tbody>
            </table>
            {!! $transactions->render() !!}
        </div>
    </div>
@stop
@section('title')
    Dashboard
@stop
@section('subtitle')
    Manage Customer & Order
@stop