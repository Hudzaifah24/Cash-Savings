@extends('layouts.dashboard-parent')

@section('pemasukan', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Pemasukan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('income.index')}}">Data Pemasukan</a></li>
                    <li class="breadcrumb-item active">Ubah Pemasukan</li>
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
                    <h3 class="card-title">Ubah Pemasukan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('income.update', $income->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Jumlah">Jumlah</label>
                                <input value="{{$income->amount}}" type="number" class="form-control" name="amount" id="Jumlah" placeholder="Masukkan Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="AsalUangDari">Asal Uang</label>
                                <input value="{{$income->from}}" type="text" class="form-control" name="from" id="AsalUangDari" placeholder="Masukkan Asal Uang">
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
