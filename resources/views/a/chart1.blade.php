@extends('a')
@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">View Payment Option</span>
            </div>
        </div>



        <h2>Total Sale By Category</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Category</th>
                <th>Total</th>
                <th>Month</th>
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
                    <td></td>
                </tr>
            @endforeach


            </tbody>
        </table>

 <h2>Total Sale By Category</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Bil</th>
            <th>Category</th>
            <th>Month</th>
            <th>Total</th>
        </tr>
        </thead>

        <tbody>
        @foreach($orderall as $kat)
            <tr>
                <td></td>
                <td>{{$kat->name}}
                </td>
                <td>

@foreach($kat->transaction as $kod)
{{$kod->created_at->format('M')}},
    @endforeach
                </td>
                <td>
                    @foreach($kat->transaction as $kod)
                        {{$kod->qty}},
                    @endforeach
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
        <hr/>
        <h2>Total Sale By Category New</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Category</th>
                <th>Month</th>
                <th>Total</th>
            </tr>
            </thead>

            <tbody>
            @foreach($cats as $kat)
                <tr>
                    <td></td>
                    <td>{{$kat->category->name}}
                    </td>
                    <td>
@foreach($bulan as $bul)
    @if($bul->category_id == $kat->category_id )
    {{$bul->created_at->format('M')}},
                            @endif
    @endforeach
                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr/>

        <hr/>
<br>
        <h2>Total Sale By Category</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Category</th>
                <th>Month</th>
                <th>Total</th>
            </tr>
            </thead>

            <tbody>
@foreach($orderall2 as $kat)
                <tr>
                    <td></td>
                    <td>
                    </td>
                    <td>



                    </td>
                    <td>
@endforeach
                    </td>
                </tr>


            </tbody>
        </table>




        <br>

        <script src="{{asset('high/js/highcharts.js')}}"></script>
        <script src="{{asset('high/js/modules/exporting.js')}}"></script>

        <div id="overall" style="margin: 0 auto"></div>

        <script type="text/javascript">
            $(function () {
                chart = new Highcharts.Chart({

                    chart: {
                        renderTo: 'overall'
                    },

                    title: {
                        text: '2015 Sales Perfomance',
                        x: -20 //center
                    },


                    yAxis: {
                        title: {
                            text: 'Sales (qty)'

                        },
                        min: 0,
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    exporting: {
                        enabled: false
                    },

                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' unit'
                    },

                    xAxis: {
                        categories: [
                            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'

                        ]
                    },

                    series: [{
                        name: 'Dept A',
                        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                    }, {
                        name: 'Dept B',
                        data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                    }, {
                        name: 'Dept C',
                        data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                    }, {
                        name: 'Dept D',
                        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                    }]
                });

            });

        </script>

    @stop
@section('title')
    View Statistic
@stop
@section('subtitle')
    Performance Statistic
@stop