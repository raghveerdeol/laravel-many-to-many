<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>
        @yield('title')
    </title>
</head>
<body>
    @include('admin.projects.partials.header')

    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form  method="POST" action="@yield('form-action')" class="form-selector">
                        @yield('form-method')
                        @csrf
                        <label for="name">Name: </label>
                        <input class="form-control" type="text" placeholder="Name" aria-label="Name" name="name" id="name" value="{{ old('name', $technology->name) }}">
                        @error('name')
                            <div class="alert alert-danger my-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="color">Color: </label>
                        <input class="form-control" type="color" placeholder="Color" aria-label="Color" name="color" id="color" value="{{ old('color', $technology->color) }}">
                        @error('color')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <input type="submit" class="btn btn-primary mb-3" value="@yield('title')">
                        <input type="reset" class="btn btn-warning mb-3" value="Reset">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        @yield('footer-content')
    </footer>
    @yield('scripts-content')
</body>
</html>
