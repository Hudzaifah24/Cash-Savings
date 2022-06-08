@extends('layouts.dashboard-parent')

@section('hutang', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Hutang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('debt.index')}}">Data Hutang</a></li>
                        <li class="breadcrumb-item active">Tambah Hutang</li>
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
                        <h3 class="card-title">Tambah Hutang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('debt.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Jumlah">Jumlah</label>
                                    <input value="{{old('amount')}}" type="number" class="form-control" name="amount" id="Jumlah" placeholder="Masukkan Jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="Dihutangi">Dihutangi</label>
                                    <input value="{{old('to_whom')}}" type="text" class="form-control" name="to_whom" id="Dihutangi" placeholder="Masukkan Orang Yang Dihutangi">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input value="{{old('email')}}" type="email" class="form-control" name="email" id="Email" placeholder="Masukkan Email">
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
