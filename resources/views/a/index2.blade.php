@extends('a')
@section('content')
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <a class="dashboard-stat dashboard-stat-light blue-madison" href="javascript:;">
                <div class="visual">
                    <i class="fa fa-briefcase fa-icon-medium"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$trans->sum('qty')}}
                    </div>
                    <div class="desc">
                        Lifetime Sales
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-light red-intense" href="javascript:;">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        RM{{$orders->sum('total_purchase')}}
                    </div>
                    <div class="desc">
                        Total Orders
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
                <div class="visual">
                    <i class="fa fa-group fa-icon-medium"></i>
                </div>
                <div class="details">
                    <div class="number">
                        @if($ris== 0)
                            No sale were made yet
                        @else
                        RM{{round($ris / $args->count())}}
                            @endif
                    </div>
                    <div class="desc">
                        Average Orders
                    </div>
                </div>
            </a>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
       @if($overall->isEmpty())
            <div class="portlet light">
                <div class="portlet-body">
                    <div class="tabbable-line">
               Graph not available due not enough data
                        </div>
                        </div>
                        </div>
        @else
            <div class="portlet light">
                <div class="portlet-body">
                    <div class="tabbable-line">
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
                                        text: '{{$tahun->format('Y')}} Sales Perfomance',
                                        x: -20 //center
                                    },

                                    xAxis: {
                                        categories: [
                                            @foreach($overall as $kat)
                                            '{{$kat->created_at->format('M')}}',
                                            @endforeach

                                    ]
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

                                    series: [{
                                        showInLegend: false,

                                        name: 'Sale',

                                        data: [
                                            @foreach($overall as $kat)
                                        {{$kat->total}},
                                            @endforeach
                                    ]
                                    }]
                                });

                            });

                        </script>
                    </div>
                </div>
            </div>
        @endif

        <!-- End: life time stats -->
    </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <!-- Begin: life time stats -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Overview</span>
                        <span class="caption-helper">weekly stats...</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#overview_1" data-toggle="tab">
                                    Top Selling </a>
                            </li>
                            <li>
                                <a href="#overview_2" data-toggle="tab">
                                    Customers </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview_1">
                                <div class="table-responsive">
                                    <table class="table table-hover table-light">
                                        <thead>
                                        <tr class="uppercase">
                                            <th>
                                                Product Name
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Sold
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tops as $top)
                                            <tr>
                                                <td>
                                                    <a href="{{url('store/view/'.$top->product->id)}}">
                                                        {{$top->product->title}} </a>
                                                </td>
                                                <td>
                                                    {{$top->product->price}}
                                                </td>
                                                <td>
                                                    {{$top->qty}}
                                                </td>
                                                <td>
                                                    <a href="{{url('store/view/'.$top->product->id)}}" class="btn default btn-xs green-stripe">
                                                        View </a>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="overview_2">
                                <div class="table-responsive">
                                    <table class="table table-hover table-light">
                                        <thead>
                                        <tr>
                                            <th>
                                                Customer Name
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $tr)
                                            <tr>
                                                <td>
                                                    <a href="{{url('admin/view/'.$tr->order->customer->id)}}">
                                                        {{$tr->order->customer->name}} </a>
                                                </td>
                                                <td>
                                                    @if($tr->order->order_status == 0)
                                                        <span class="label label-sm label-warning">
													Pending </span>
                                                    @elseif($tr->order->order_status == 1)
                                                        <span class="label label-sm label-info">
													In Process </span>
                                                    @else($tr->order->order_status == 2)
                                                        <span class="label label-sm label-success">
													Completed </span>
                                                    @endif

                                                </td>
                                                <td>
                                                    RM{{$tr->order->total_purchase}}
                                                </td>
                                                <td>
                                                    {{$tr->order->order_date}}
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/view/'.$tr->order->customer->id)}}" class="btn default btn-xs green-stripe">
                                                        View </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {!! $transactions->render() !!}
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
        <div class="col-md-6">
            <!-- Begin: life time stats -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Overview by Category</span>
                        <span class="caption-helper">Monthly Stats</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-line">
@if($katoo->isEmpty())
    Not enough data
                        @else
                        <canvas id="monthly-reports"></canvas>


                        <script src="{{asset('chart/Chart.js')}}"></script>
                        <script>
                            (function() {
                                var ctx = document.getElementById('monthly-reports').getContext('2d');
                                var chart = {

                                    labels: [
                                        @foreach($namo as $na)
                                    "{{$na}}",
                                        @endforeach
                               ],

                                    datasets: [
                                        {
                                            label: "-",
                                            fillColor: "rgba(151,187,205,0.2)",
                                            strokeColor: "rgba(151,187,205,1)",
                                            pointColor: "rgba(151,187,205,1)",
                                            pointStrokeColor: "#fff",
                                            pointHighlightFill: "#fff",
                                            pointHighlightStroke: "rgba(151,187,205,1)",
                                            responsive: true,
                                            scaleShowVerticalLines: false,
                                            showScale: false,

                                            data: [
                                                @foreach($katoo as $kat)
                                                                            {{$kat->transaction->sum('qty')}},
                                                @endforeach

                                        ],

                                          }



                                    ]
                                };

                                new Chart(ctx).Bar(chart, {
                                responsive: true ,
                                    barStrokeWidth : 1
                                });
                            })();
                        </script>
    @endif
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>

<!-- END PAGE CONTENT INNER -->

    <!-- END PAGE CONTENT INNER -->

@stop
@section('title')
    Dashboard
@stop
@section('subtitle')
    Manage Customer & Order
@stop