@extends('layouts.technologies.create-or-edit')
@section('title')
    Create new technology
@endsection

@section('form-action')
    {{ route('admin.technologies.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection
