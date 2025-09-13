@extends('backEnd.layouts.master')
@section('title','Dashboard')
@section('css')
    <!-- Plugins css -->
    <link href="{{asset('backEnd/')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backEnd/')}}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Total Order -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card" style="background:#0EA2AC; ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border text-white ">
                                    <i class="fe-shopping-cart font-22 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6" >
                                <a href="{{ route('admin.orders',['slug'=>'all']) }}">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $total_order_count }}</span></h3>
                                        <p class="text-light mb-1 text-truncate">Total Order</p>
                                        <small class="text-light">Amount: {{ number_format($total_order_amount, 2) }}৳</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Order -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card" style="background:#2DAC37;" >
                    <div class="card-body">
                        <a href="{{ route('admin.orders',['slug'=>'pending']) }}">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                        <i class="fe-clock font-22 avatar-title text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $pending_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Pending Order</p>
                                        <small class="text-muted">Amount: {{ number_format($pending_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Approved / Processing Order -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'processing']) }}" >
                    <div class="widget-rounded-circle card" style="background:#F5BD08;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fe-check-circle font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $processing_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Approved Order</p>
                                        <small class="text-muted">Amount: {{ number_format($processing_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Packed / On The Way -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'on-the-way']) }}">
                    <div class="widget-rounded-circle card" style="background:#C9213B;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fe-package font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $on_the_way_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Packed Order</p>
                                        <small class="text-muted">Amount: {{ number_format($on_the_way_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- On Hold -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'on-hold']) }}">
                    <div class="widget-rounded-circle card" style="background:#133F5C;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                                        <i class="fe-pause font-22 avatar-title text-secondary"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $on_hold_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">On Hold</p>
                                        <small class="text-muted">Amount: {{ number_format($on_hold_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Returned / Cancelled -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'cancelled']) }}">
                    <div class="widget-rounded-circle card" style="background:#EA5E5D;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                                        <i class="fe-rotate-ccw font-22 avatar-title text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $cancelled_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Returned Order</p>
                                        <small class="text-muted">Amount: {{ number_format($cancelled_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Delivered -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'completed']) }}" style="background:#EA3E5D;">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fe-truck font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $completed_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Delivered Order</p>
                                        <small class="text-muted">Amount: {{ number_format($completed_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- In Courier -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'in-courier']) }}">
                    <div class="widget-rounded-circle card"  style="background:#ee0979;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fe-map-pin font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $in_courier_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">In Courier</p>
                                        <small class="text-muted">Amount: {{ number_format($in_courier_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Didn't Receive Call -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('admin.orders',['slug'=>'didnt-receive-call']) }}">
                    <div class="widget-rounded-circle card" style="background: #033587;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                                        <i class="fe-phone-missed font-22 avatar-title text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $didnt_receive_count }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Didn't Receive Call</p>
                                        <small class="text-muted">Amount: {{ number_format($didnt_receive_amount, 2) }}৳</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Today's Order -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card" style="background: #0f821d">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-shopping-bag font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $today_order_count }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Today's Order</p>
                                    <small class="text-muted">Amount: {{ number_format($today_order_amount, 2) }}৳</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('products.index') }}">
                    <div class="widget-rounded-circle card" style="background: #00a160">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fe-database font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">{{ $total_product }}</h3>
                                        <p class="text-muted mb-1 text-truncate">Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Customers -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card" style="background: #ee0979">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                    <i class="fe-user font-22 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $total_customer }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3">Latest 5 Orders</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                                <thead class="table-light">
                                <tr>
                                    <th colspan="2">Id</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latest_order as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td style="width: 36px;">
                                            @if($order->product)
                                                <img src="{{asset($order->product->image?$order->product->image->image:'')}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            @endif
                                        </td>

                                        <td>
                                            {{$order->invoice_id}}
                                        </td>

                                        <td>
                                            {{$order->amount}}
                                        </td>

                                        <td>
                                            {{$order->customer?$order->customer->name:''}}
                                        </td>
                                        <td>
                                            {{$order->order_status}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title mb-3">Latest Customers</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                                <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latest_customer as $customer)
                                    <tr>
                                        <td>
                                            <h5 class="m-0 fw-normal">{{$loop->iteration}}</h5>
                                        </td>

                                        <td>
                                            {{$customer->name}}
                                        </td>

                                        <td>
                                            {{$customer->phone}}
                                        </td>

                                        <td>
                                            {{$customer->created_at->format('d-m-Y')}}
                                        </td>

                                        <td>
                                            {{$customer->status}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>




    </div> <!-- container -->
@endsection
@section('script')
    <!-- Plugins js-->
    <script src="{{asset('backEnd/')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('backEnd/')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('backEnd/')}}/assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <script>

        var colors = ["#f1556c"],
            dataColors = $("#total-revenue").data("colors");
        dataColors && (colors = dataColors.split(","));
        var options = {

                chart: {
                    height: 242,
                    type: "radialBar"
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: "65%"
                        }
                    }
                },
                colors: colors,
                labels: ["Delivery"]
            },
            chart = new ApexCharts(document.querySelector("#total-revenue"), options);
        chart.render();
        colors = ["#1abc9c", "#4a81d4"];
        (dataColors = $("#sales-analytics").data("colors")) && (colors = dataColors.split(","));
        options = {
            series: [{
                name: "Revenue",
                type: "column",
                data: [@foreach($monthly_sale as $sale) {{$sale->amount}}, @endforeach]
            }, {
                name: "Sales",
                type: "line",
                data: [@foreach($monthly_sale as $sale) {{$sale->amount}}, @endforeach]
            }],
            chart: {
                height: 378,
                type: "line",
            },
            stroke: {
                width: [2, 3]
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%"
                }
            },
            colors: colors,
            dataLabels: {
                enabled: !0,
                enabledOnSeries: [1]
            },
            labels: [@foreach($monthly_sale as $sale) {{date('d', strtotime($sale->date))}} + '-' + {{date('m', strtotime($sale->date))}}+ '-' + {{date('Y', strtotime($sale->date))}}, @endforeach],
            legend: {
                offsetY: 7
            },
            grid: {
                padding: {
                    bottom: 20
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: .25,
                    gradientToColors: void 0,
                    inverseColors: !0,
                    opacityFrom: .75,
                    opacityTo: .75,
                    stops: [0, 0, 0]
                }
            },
            yaxis: [{
                title: {
                    text: "Net Revenue"
                }
            }]
        };
        (chart = new ApexCharts(document.querySelector("#sales-analytics"), options)).render(), $("#dash-daterange").flatpickr({
            altInput: !0,
            mode: "range",
        });
    </script>
@endsection
