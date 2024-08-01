@extends('layouts.technologies.create-or-edit')
@section('title')
    Edit {{ $technology->name }}
@endsection

@section('form-action')
    {{ route('admin.technologies.update', $technology) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection
