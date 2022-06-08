@extends('layouts.parent')

@section('content')
    <div style="height: 500px" class="overflow-auto">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/images/trial.jpg')}}" class="d-block w-100" height="450" alt="...">
                    {{-- <img src="{{asset('assets/images/carousel1.jpg')}}" class="d-block w-100" height="450" alt="..."> --}}
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/images/trial.jpg')}}" class="d-block w-100" height="450" alt="...">
                    {{-- <img src="{{asset('assets/images/carousel2.jpg')}}" class="d-block w-100" height="450" alt="..."> --}}
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/images/trial.jpg')}}" class="d-block w-100" height="450" alt="...">
                    {{-- <img src="{{asset('assets/images/carousel3.jpg')}}" class="d-block w-100" height="450" alt="..."> --}}
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row row-cols-3">
            @foreach ($videos as $video)
                <div class="col text-center mb-3">
                    <div class="bg-dark">
                        <a href="{{route('detail.video', $video->id)}}">
                            <video class="w-100 h-100">
                                <source src="{{asset('assets/videos/'. $video->video)}}" type="video/mp4">
                                <source src="{{asset('assets/videos/'. $video->video)}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

