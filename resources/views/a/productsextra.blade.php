@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">View Image</span>
            </div>
        </div>



       @if (!$images->count() )
            <div class="alert alert-info alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>Info:</strong> No extra image created yet.</div>
        @else
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="info">
                    <th width="3%">Bil</th>
                    <th>Gambar Produk</th>
                    <th>Option</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>

                <?php $i = 1; ?>
                @foreach($images as $product)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><div style="overflow: hidden; padding-right: .5em;"><img src="{{asset('/'.$product->img)}}" alt="{{$product->product->title}}" width="50px"> </div></td>
                        <td>{{$product->name}}</td>
                        <td>
                            {!! Form::open(['url' =>['admin/products/extradestroy', $product->id]]) !!}
                            {!! Form::hidden('id',$product->id) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>

                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>

        @endif
<h2>Upload Image</h2>
        <hr/>

        <div class="portlet-body form">
            {!! Form::open(array('url' => 'admin/products/extra/'.$products->id,'role' => 'form' , 'files' => true )) !!}
            <div class="form-group">
                {!! Form::label('name', 'Option Name:',['class'=>'form-label']) !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Product Image :',['class'=>'form-label']) !!}
                {!! Form::file('image',null,['class'=>'form-control']) !!}
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
    Manage Extra Image
@stop
@section('subtitle')
    View & Delete Extra Image
@stop