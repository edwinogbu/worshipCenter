@extends('layouts.mainApp')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>


    <!-- Chart -->
    <div class="row">
        <div class="col-lg-12">
            <div class=" box card mb-3">
            <div class="box-head">
                <i class="fas fa-chart-bar"></i>
                Users Record <small class="badge badge-info">(This Month Data)</small></div>
            <div class="box-body" style="height: 400px; width:900px; margin:auto;">
                <canvas id="barChart" width="100%" height="30"></canvas>
            </div>
            <div class="box-footer card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('dashboard/vendor/chart/chart.min.js') }}"></script>
    <script>
        //user bar Chart
        $(function () {
            var datas = <?php echo json_encode($datas); ?>;
            var barCavas = $("#barChart");
            var barChart = new Chart(barCavas,{
                type:'bar',
                data:{
                    labels:['Jan','Feb','Mar','April','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec' ],
                    datas:[
                        {
                            label:'New User Growth, 2022',
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','blue','indigo','purple','pink','silver','gold','brown']
                        }
                    ]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });

    </script>
@endpush
