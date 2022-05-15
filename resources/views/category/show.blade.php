@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="{{ route('category.index') }}" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my category</a>
            <h1 class="mb-3">{{ $category->name }}</h1>
            <h2 class="mb-3">{{ $category->user->name }}</h2>
        </div>
    </div>
@endsection
