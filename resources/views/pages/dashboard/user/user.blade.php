@extends('layouts.dashboard-parent')

@section('users', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Users</li>
                </ol>
            </div>
        </div>
        <a href="{{route('create.users.back')}}" class="btn btn-primary">Tambah</a>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Users Dengan Semua Role</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{asset('assets/images/users/'. $data->image)}}" alt="peaple-{{$data->id}}" class="rounded-circle" style="width: 3rem">
                                    </td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    @php
                                        $now = date('Y');
                                        $lahir = date_create($data->age);
                                        $date = date_format($lahir, 'Y');
                                        $umur = $now - $date;
                                    @endphp
                                    <td>{{$umur. ' Tahun'}}</td>
                                    <td>
                                        <a href="{{route('edit.users.back', $data->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{route('delete.users.back', $data->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
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
