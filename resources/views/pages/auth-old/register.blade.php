<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('includes.bootstrap')
        <title>ViP husum</title>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper container">
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Register</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{route('proses.signup')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputName">Name</label>
                                                <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputAge">Age</label>
                                                <input value="{{old('age')}}" type="date" name="age" class="form-control" id="exampleInputAge">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input value="{{old('email')}}" type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Sign-Up</button>
                                            <a href="{{route('login')}}" class="ms-3">Sign-In</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                        </div>
                    <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
            </div>
        </div>
    </body>
</html>
