@extends('layouts.dashboard-parent')

@section('pemasukan', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pemasukan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('saving.index')}}">Data Pemasukan</a></li>
                    <li class="breadcrumb-item active">Tambah Pemasukan</li>
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
                    <h3 class="card-title">Tambah Pemasukan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('income.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Jumlah">Jumlah</label>
                                <input value="{{old('amount')}}" type="number" class="form-control" name="amount" id="Jumlah" placeholder="Masukkan Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="AsalUangDari">Asal Uang</label>
                                <input value="{{old('from')}}" type="text" class="form-control" name="from" id="AsalUangDari" placeholder="Masukkan Asal Uang">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Tanggal">Tanggal</label>
                                        <input value="{{old('day')}}" type="number" class="form-control" name="day" id="Tanggal" placeholder="Masukkan Tanggal">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Bulan">Bulan</label>
                                        <input value="{{old('month')}}" type="number" class="form-control" name="month" id="Bulan" placeholder="Masukkan Bulan">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Tahun">Tahun</label>
                                        <input value="{{old('year')}}" type="number" class="form-control" name="year" id="Tahun" placeholder="Masukkan Tahun">
                                    </div>
                                </div>
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
