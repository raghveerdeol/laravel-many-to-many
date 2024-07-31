@extends('layouts.types.create-or-edit')
@section('title')
    Create new type
@endsection

@section('form-action')
    {{ route('admin.types.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection
