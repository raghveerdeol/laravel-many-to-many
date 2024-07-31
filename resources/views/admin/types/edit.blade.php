@extends('layouts.types.create-or-edit')
@section('title')
    Edit {{ $type->name }}
@endsection

@section('form-action')
    {{ route('admin.types.update', $type) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection
