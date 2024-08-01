@extends('layouts.admin')
@section('title')
    show {{ $technology->name }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2><strong>{{ $technology->name }}</strong></h2>
            <h4><em>{{ $technology->color }}</em></h4>
            <ul>
                @foreach ($technology->projects as  $project)
                    <li>
                        <a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('script-section')
    @vite('resources/js/delete-alert.js')
@endsection
