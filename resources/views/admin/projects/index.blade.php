@extends('layouts.admin')
@section('title')
    Projects
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Technologies</th>
                        <th scope="col">Title</th>
                        <th scope="col">Started on</th>
                        <th scope="col">Finished</th>
                        <th scope="col">Website</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        @if ($project->type)
                        <td><a href="{{ route('admin.types.show', $project->type) }}" style="background: {{ $project->type->color }}"  class="badge rounded-pill btn">{{ $project->type->name }}</a></td>
                        @else
                            <td>----</td>
                        @endif

                        <td>
                            @forelse ($project->technologies as $technology )
                            <span  style="background: {{ $technology->color }}" class="badge rounded-pill"s>
                                {{ $technology->name }}
                            </span>
                            @empty
                            No technology
                            @endforelse
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->started_on }}</td>
                        @if ($project->finished === 1)
                        <td>Finished</td>
                        @else
                        <td>Not finished</td>
                        @endif
                        <td>{{ $project->website_url }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline-block form-deleter">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-warning btn-sm">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{$projects->links()}}
@endsection

@section('script-section')
    @vite('resources/js/delete-alert.js')
@endsection
