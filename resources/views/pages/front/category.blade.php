@extends('layouts.parent')

@section('content')
    <!-- Category -->
        <section class="pb-5 text-center">
            <div class="container">
                <div class="row mb-5">
                    <div class="col">
                    <h1 class="pb-3">Categories</h1>
                    <hr class="w-25 mx-auto">
                    <p>Pilihlah Pilihan Anda Untuk Dipilih!</p>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="container mb-5">
                        <div class="row row-cols-md-4 row-cols-sm-1">
                            @foreach ($categories as $category)
                                <div class="col text-center mb-3">
                                    <a class=" text-decoration-none" href="{{route('detail.category', $category->id)}}">
                                        <div class="bg-secondary text-dark rounded py-2">
                                            {{$category->name}}
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
