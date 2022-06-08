@extends('layouts.parent')

@section('content')
    <!-- Team Profile -->
    <section class="pb-5 text-center" id="team">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                <h1 class="pb-3">Users</h1>
                <hr class="w-25 mx-auto">
                <p>Daftarkan diri anda sekarang!</p>
                </div>
            </div>

            <div class="row">
                <!-- Kode Untuk User Di sini -->
                @foreach ($users as $user)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('assets/images/users/'. $user->image)}}" alt="peaple1" class="img-fluid rounded-circle w-50 mb-3">
                                <h3 class="mt-2">{{$user->name}}</h3>
                                <h5 class="text-muted">{{$user->email}}</h5>
                                <div class="py-3">
                                    <a href="{{$user->facebook == null ? '#' : $user->facebook}}" class="text-secondary text-decoration-none fs-5 me-4">
                                        <i class="bi-facebook"></i>
                                    </a>
                                    <a href="{{$user->twitter == null ? '#' : $user->twitter}}" class="text-secondary text-decoration-none fs-5 me-4">
                                        <i class="bi-twitter"></i>
                                    </a>
                                    <a href="{{$user->instagram == null ? '#' : $user->instagram}}" class="text-secondary text-decoration-none fs-5">
                                        <i class="bi-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
