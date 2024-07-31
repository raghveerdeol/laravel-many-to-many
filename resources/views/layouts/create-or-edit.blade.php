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
                        <label for="title">Title: </label>
                        <input class="form-control" type="text" placeholder="Title" aria-label="Title" name="title" id="title" value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div class="alert alert-danger my-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="language">Language: </label>
                        <input class="form-control" type="text" placeholder="Language" aria-label="Language" name="language" id="language" value="{{ old('language', $project->language) }}">
                        @error('language')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="btn-group d-block my-2" role="group" aria-label="Basic checkbox toggle button group">

                            @foreach ($technologies as $technology )
                                @if ($errors->any())
                                <input type="checkbox" class="btn-check" name="technologies[]" id="technology-{{$technology->id}}" value="{{$technology->id }}" {{ in_arry($technology->id, old('technologies[]')) ? "checked" : ''}} autocomplete="off">
                                @else
                                <input type="checkbox" class="btn-check" name="technologies[]" id="technology-{{$technology->id}}" value="{{$technology->id }}" {{ $project->technologies->contains($technology) ? "checked" : ''}} autocomplete="off">
                                @endif
                            <label class="btn btn-outline-primary" for="technology-{{$technology->id}}">{{$technology->name}}</label>
                            @endforeach
                        </div>
                        @error('technologies')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="type_id" class="mt-1">Types: </label>
                        <select class="form-select mb-2" name="type_id" aria-label="Types">
                            @foreach ( $types as $type )
                            <option value="{{ $type->id }}" {{ ($type->id == old('type_id', $project->type_id)) ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="content">Content: </label>
                        <textarea class="form-control" type="text" placeholder="Content" aria-label="Content" name="content" id="content" rows="8">{{ old('content', $project->content) }}</textarea>
                        @error('content')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="started_on">Started on: </label>
                        <input class="form-control" type="date" placeholder="Started on" aria-label="Started on" name="started_on" id="started_on" value="{{ old('started_on', $project->started_on) }}">
                        @error('started_on')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="finished" id="finished1" value="1" {{ (1 === old('finished', $project->finished)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="finished1">
                                Finished
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="finished" id="finished2" value="0" {{ (0 === old('finished', $project->finished)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="finished2">
                                Not finished
                            </label>
                        </div>

                        <label for="image_url">Image: </label>
                        <input class="form-control" type="text" placeholder="Image_url" aria-label="Image_url" name="image_url" id="image_url" value="{{ old('image_url', $project->image_url) }}">
                        @error('image_url')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="website_url">Website: </label>
                        <input class="form-control my-2" type="text" placeholder="Website_url" aria-label="Website_url" name="website_url" id="website_url" value="{{ old('website_url',  $project->website_url) }}">
                        @error('website_url')
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
