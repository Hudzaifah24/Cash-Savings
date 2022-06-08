<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('includes.bootstrap')
        @stack('style')
        <title>Tabungan</title>
    </head>
    <body class="bg-danger">
        @include('layouts.navbar')

        <div>
            <div class="container mt-3 mb-5">
                <form action="{{route('home')}}" class="input-group mb-3">
                    <input type="text" class="form-control" name="filter" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary btn-primary text-dark" type="button" id="button-addon2">Search...</button>
                </form>
            </div>

            @yield('content')
        </div>

        @stack('script')
    </body>
</html>
