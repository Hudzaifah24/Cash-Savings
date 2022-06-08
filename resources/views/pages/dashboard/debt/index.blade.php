@extends('layouts.dashboard-parent')

@section('hutang', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Hutang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Hutang</li>
                    </ol>
                </div>
            </div>
            <a href="{{route('debt.create')}}" class="btn btn-primary">Tambah</a>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Hutang Dengan Semua Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Dihutangi</th>
                                    <th>Email</th>
                                    <th>Sisa Bayar</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($debts as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{'Rp.'.number_format($data->amount)}}</td>
                                        <td>{{$data->to_whom}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{'Rp.'.number_format($data->reminder_amount)}}</td>
                                        <td>
                                            @if ($data->status == true)
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{$data->date}}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#payModal{{$data->id}}">
                                                Bayar
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="payModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bayar Hutang Kepada {{$data->to_whom}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('debt.pay', $data->id)}}" method="POST" class="modal-body" id="pay">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="amount" class="form-label">Jumlah</label>
                                                                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Masukkan Jumlah Bayaran Anda">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Bayar Dengan?</label>
                                                                    <div class="row justify-content-around form-group">
                                                                        <label for="a" class="form-label">
                                                                            <input type="radio" class="form-control" name="with" value="savings" id="a">
                                                                            <span>Dengan Tabungan</span>
                                                                        </label>
                                                                        <label for="b" class="form-label">
                                                                            <input type="radio" class="form-control" name="with" value="pockets" id="b">
                                                                            <span>Dengan Uang Saku</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button form="pay" type="submit" class="btn btn-success">Bayar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('debt.edit', $data->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{route('debt.destroy', $data->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                            <a href="{{route('debt.refresh', $data->id)}}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Dihutangi</th>
                                    <th>Email</th>
                                    <th>Sisa Bayar</th>
                                    <th>Status</th>
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
