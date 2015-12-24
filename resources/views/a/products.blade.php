@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">View Product</span>
            </div>
        </div>
        @if ($products->isEmpty())
            <div class="alert alert-info alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>Info:</strong> No products created yet.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="3%">Bil</th>
                        <th width="25%">Nama Product</th>
                        <th width="5%">Image</th>
                        <th width="5%">Harga</th>
                        <th width="20%">Status</th>
                        <th width="10%">Category</th>
                        <th width="10%">Action</th>
                        <th width="5%">Extra Image</th>
                        <th width="5%">Update</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 1; ?>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$product->title}}</td>
                            <td><div style="overflow: hidden; padding-right: .5em;"><img src="{{asset('/'.$product->image)}}" alt="{{$product->title}}" width="50px"> </div>
                            </td>
                            <td>RM{{$product->price}}</td>
                            <td>{!! Form::open(['url' =>['admin/products/status', $product->id]]) !!}
                                {!! Form::hidden('id',$product->id) !!}
                                {!! Form::submit('Update', ['class' => 'btn btn-sm blue', 'style' => 'float: right; height:30px']) !!}
                                <div style="overflow: hidden; padding-right: .5em;">
                                    {!! Form::select('status',(['0' => 'Out of Stock','1' => 'In Stock']), $product->status,['class' => 'form-control', 'style' => 'width:100%; height:30px;']) !!}
                                </div>

                                {!! Form::close() !!}

                            </td>
                            <td>{{$product->category->name}} </td>
                            <td>
                                {!! Form::open(['url' =>['admin/products/destroy', $product->id]]) !!}
                                {!! Form::hidden('id',$product->id) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                            <td><a href="{{url('admin/products/extra/'.$product->id)}}"><btn class="btn btn-sm blue">Insert</btn></a></td>
                            <td><a href="{{url('admin/products/update/'.$product->id)}}"><btn class="btn btn-sm blue">Update</btn></a></td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $products->render() !!}
        @endif

        <hr/>

    </div>
@stop
@section('title')
    Manage Products
@stop
@section('subtitle')
    View & Delete Products
@stop