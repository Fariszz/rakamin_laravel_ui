@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Article</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="{{ route('article.store') }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-select">
                    {{-- <option value="Test">Category</option> --}}
                    @foreach ($category as $kategori)
                        @if(old('category_id') == $kategori->id)
                            <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                        @endif
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <input id="body" type="hidden" name="content">
                <textarea name="content" id="" cols="100" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Article</button>
        </form>
    </div>
</div>
@endsection
