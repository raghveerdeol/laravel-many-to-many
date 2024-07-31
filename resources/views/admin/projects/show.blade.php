@extends('layouts.admin')
@section('title')
{{$project->title}}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card mb-4" style="width: 18rem;">
                <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $project->title }}</strong></h5>
                    <h6 class="card-title badge rounded-pill" style="background: {{ $project->type->color }}"><em>{{ $project->type->name }}</em></h6>
                    <div>
                        @foreach ($project->technologies as $technology )
                        <span class="card-title badge rounded-pill" style="background: {{ $technology->color }}"><em>{{ $technology->name }}</em></span>
                        @endforeach
                    </div>
                    <p class="card-text"><em>Language: {{ $project->language }} - started on: {{ $project->started_on }}</em></p>
                    <p class="card-text">{{ $project->content }}</p>
                    @if ($project->finished === 1)
                    <p class="card-text"><strong>Finished</strong></p>
                    @else
                    <p class="card-text"><strong>Not finished</strong></p>
                    @endif
                    <a href="{{ $project->website_url }}" class="btn btn-primary">Website</a>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline-block form-deleter">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-warning btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-section')
    @vite('resources/js/delete-alert.js')
@endsection

