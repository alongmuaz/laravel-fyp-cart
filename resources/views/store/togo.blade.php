@extends('app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Category : {{$categories->name}} </th>
            </tr>
            </thead>
<tbody>

@foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
    </tr>
        @endforeach



</tbody>
        </table>
    </div>
    @stop