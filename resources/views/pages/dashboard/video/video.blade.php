@extends('layouts.dashboard-parent')

@section('videos', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Videos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Videos</li>
                </ol>
            </div>
        </div>
        <a href="{{route('create.videos.back')}}" class="btn btn-primary">Tambah</a>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Videos Dengan Semua Role</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->category->name}}</td>
                                    <td>{{$data->user->name}}</td>
                                    <td>
                                        <a href="{{route('show.videos.back', $data->id)}}" class="btn btn-sm btn-info">Show</a>
                                        <a href="{{route('edit.videos.back', $data->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{route('delete.videos.back', $data->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>User</th>
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
