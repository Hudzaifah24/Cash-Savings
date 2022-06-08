@extends('layouts.dashboard-parent')

@section('tabungan', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Tabungan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Tabungan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Total Tabungan Anda Sekarang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span class="text-muted">Total Tabungan</span>
                                <h1>Rp. {!!number_format($savingAmount - $expenditure_saving).",<span class='text-success'>00</span>"!!}</h1>
                                <p class="mb-1">
                                    <span class="text-warning">*</span><span class="text-success">{!!number_format($savingAmount).',00'!!}</span>
                                    <span>-</span>
                                    <span class="text-danger">{!!number_format($expenditure_saving).',00'!!}</span>
                                </p>
                                <br>
                                <span class="text-muted">Pemasukan Bulan Ini</span>
                                <h1>Rp. {!!number_format($incomeAmount).",<span class='text-success'>00</span>"!!}</h1>
                                <br>
                                <span class="text-muted">Pengeluaran Bulan Ini</span>
                                <h1>Rp. {!!number_format($expenditureAmount).",<span class='text-success'>00</span>"!!}</h1>
                            </div>
                            <div class="col-8">
                                <!-- Bar chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i>
                                            Bar Chart {{date('Y')}}
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="bar-chart" style="height: 300px;"></div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Tabungan Dengan Semua Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($savings as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{'Rp.'.number_format($data->amount)}}</td>
                                        <td>{{$data->date}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
</section>
@endsection


@push('script')
    <script>
        $(function () {
            /*
            * BAR CHART
            * ---------
            */

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            var bar_data = {
                data : [[1,{{$chart['jan']}}], [2,{{$chart['feb']}}], [3,{{$chart['mar']}}], [4,{{$chart['apr']}}], [5,{{$chart['mei']}}], [6,{{$chart['jun']}}], [7,0], [8,0], [9,0], [10,0], [11,0], [12,0]],
                bars: { show: true },
            }
            $.plot('#bar-chart', [bar_data], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                    show: true, barWidth: 0.5, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: [[1,'Jan'], [2,'Feb'], [3,'Mar'], [4,'Apr'], [5,'Mei'], [6,'Jun'], [7,'Jul'], [8,'Agu'], [9,'Sep'], [10,'Okt'], [11,'Nov'], [12,'Des']]
                },
            })
            /* END BAR CHART */
        });
    </script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $("#datatable1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
