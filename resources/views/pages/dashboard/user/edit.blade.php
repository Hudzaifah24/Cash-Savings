@extends('layouts.dashboard-parent')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.back')}}">Data Users</a></li>
                    <li class="breadcrumb-item active">Update Users</li>
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
                    <h3 class="card-title">Update User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('update.users.back', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input value="{{$user->name}}" type="text" class="form-control" name="name" id="Name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input value="{{$user->email}}" type="email" class="form-control" name="email" id="Email" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group">
                                <label for="Image">Image</label>
                                <input style="height: 100px" type="file" class="form-control" name="image" id="Image">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" name="password" id="Password" placeholder="Enter Password (if you will change)">
                            </div>
                            <div class="form-group">
                                <label for="yearOfBirth">Year Of Birth</label>
                                <input value="{{$user->age}}" type="date" class="form-control" name="age" id="yearOfBirth" placeholder="Enter Birth">
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
