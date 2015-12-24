@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">View Category</span>
            </div>
        </div>
        @if ($categories->isEmpty())
            <div class="alert alert-info alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>Info:</strong> No categories created yet.</div>
        @else
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th width="5%">Bil</th>
                    <th width="65%">Nama Category</th>
                    <th width="15%">Action</th>
                    <th width="15%">View Product</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$cat->name}}</td>
                        <td>
                            {!! Form::open(['url' =>['admin/categories/destroy', $cat->id]]) !!}
                            {!! Form::hidden('id',$cat->name) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}

                        </td>
                        <td><a href="{{url('admin/categories/details/'.$cat->id)}}"><btn class="btn btn-info btn-sm">View Products</btn></a></td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            {!! $categories->render() !!}
        @endif

    </div>
    </div>
@stop
@section('title')
    View Categories
@stop
@section('subtitle')
    View and Delete Categories
@stop