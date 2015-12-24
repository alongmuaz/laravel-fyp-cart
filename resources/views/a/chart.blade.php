@extends('a')
@section('content')
    <div id="placeholder"></div>
    <h2>Total Sale By Category</h2>
  <table class="table">
      <thead>
      <tr>
          <th>Bil</th>
          <th>Category</th>
          <th>Total</th>
      </tr>
      </thead>

      <tbody>
@foreach($kato as $kat)
      <tr>
          <td>{{$kat->id}}</td>
          <td>{{$kat->name}}</td>
          <td>
              {{$kat->transaction->sum('qty')}}

          </td>
      </tr>
@endforeach


      </tbody>
  </table>

    <div id="chart-div"></div>
    @PieChart('IMDB', 'chart-div')
    <h2>Top 5 Sale</h2>
<table class="table">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tops as $top)
    <tr>
        <td>{{$top->product->title}}</td>
        <td>{{$top->qty}}</td>
    </tr>
        @endforeach
    </tbody>
</table>


    @stop
@section('title')
    View Statistic
@stop
@section('subtitle')
    Performance Statistic
@stop