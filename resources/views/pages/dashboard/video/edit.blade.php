@extends('layouts.dashboard-parent')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Videos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('videos.back')}}">Data Videos</a></li>
                    <li class="breadcrumb-item active">Edit Videos</li>
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
                    <h3 class="card-title">Edit Video</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('update.videos.back', $video->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$video->title}}" id="Title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="Users">User</label>
                                <select class="form-control" name="users_id" id="Users">
                                    <option disabled selected>- Select One -</option>
                                    @foreach ($users as $user)
                                        <option {{$user->id == $video->users_id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}} - {{$user->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Category">Category</label>
                                <select class="form-control" name="category_id" id="Category">
                                    <option disabled selected>- Select One -</option>
                                    @foreach ($categories as $category)
                                        <option {{$category->id == $video->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input style="height: 100px" type="file" class="form-control" name="video" id="video" placeholder="Enter Video">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="editor1" name="description" id="description" class="form-control text-dark">{{$video->description}}</textarea>
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

@push('style')
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
@endpush

@push('script')
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.config.autoParagraph = false;
    </script>
@endpush
