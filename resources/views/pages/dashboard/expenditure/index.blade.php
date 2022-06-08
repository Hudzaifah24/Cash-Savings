@extends('layouts.dashboard-parent')

@section('pengeluaran', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pengeluaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pengeluaran</li>
                </ol>
            </div>
        </div>
        <a href="{{route('expenditure.create')}}" class="btn btn-primary">Tambah</a>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pengeluaran Dengan Semua Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Untuk</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenditures as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{'Rp.'.number_format($data->amount)}}</td>
                                    <td>{{$data->for}}</td>
                                    <td>{{$data->date}}</td>
                                    <td>
                                        <a href="{{$data->debt_id != NULL ? '#' : route('expenditure.edit', $data->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{route('expenditure.destroy', $data->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Untuk</th>
                                <th>Tanggal</th>
                                <th>Action</th>
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
