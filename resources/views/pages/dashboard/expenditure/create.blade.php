@extends('layouts.dashboard-parent')

@section('pengeluaran', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pengeluaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('expenditure.index')}}">Data Pengeluaran</a></li>
                    <li class="breadcrumb-item active">Tambah Pengeluaran</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Pengeluaran</h3>
                    </div>
                    <!-- form start -->
                    <form action="{{route('expenditure.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Jumlah">Jumlah</label>
                                <input value="{{old('amount')}}" type="number" class="form-control" name="amount" id="Jumlah" placeholder="Masukkan Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Keperluan</label>
                                <input value="{{old('for')}}" type="text" class="form-control" name="for" id="keperluan" placeholder="Masukkan Keperluan">
                            </div>
                            <div class="form-group">
                                <label for="proof">Bukti</label>
                                <input value="{{old('proof')}}" type="file" class="form-control" name="proof" id="proof" placeholder="Masukkan Bukti">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal</label>
                                <input value="{{old('date')}}" type="date" class="form-control" name="date" id="Tanggal" placeholder="Masukkan Tanggal">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</section>
@endsection
