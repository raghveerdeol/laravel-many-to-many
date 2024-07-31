@extends('layouts.create-or-edit
')
@section('title')
    Create new project
@endsection

@section('form-action')
    {{ route('admin.projects.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection

