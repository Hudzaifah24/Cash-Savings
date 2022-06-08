@extends('layouts.dashboard-parent')

@section('videos', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Video</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('videos.back')}}">Data Video</a></li>
                    <li class="breadcrumb-item active">Detail Video</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Video</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div>
                                <video class="w-100 h-100" controls>
                                    <source src="{{asset('assets/videos/'.$video->video)}}" type="video/mp4">
                                    <source src="{{asset('assets/videos/'.$video->video)}}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="col">
                            <table class="h-50">
                                <tr>
                                    <th>Title</th>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{$video->title}}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{$video->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{$video->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{$video->description}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
