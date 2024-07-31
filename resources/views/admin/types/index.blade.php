@extends('layouts.admin')
@section('title')
    Types
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">List</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <th>{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->color }}</td>
                        <td>{{ count($type->projects) }}</td>
                        <td><a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline-block form-deleter">
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
@endsection

@section('script-section')
    @vite('resources/js/delete-alert.js')
@endsection
