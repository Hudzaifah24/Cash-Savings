@extends('layouts.parent')

@section('content')
    <!-- Video -->
    <section class="pb-5 text-center">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                <h1 class="pb-3">Videos</h1>
                <hr class="w-25 mx-auto">
                <p>Pilihlah Pilihan Anda Untuk Dipilih!</p>
                </div>
            </div>

            <div class="mb-3">
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
        </div>
    </section>
@endsection
