@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Article</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="{{ route('article.update', $article->id) }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title',$article->title) }}">
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
                        @if(old('category_id',$article->category_id) == $kategori->id)
                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                        @endif
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                {{-- <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{ $article->image }}"> --}}
                <input type="hidden" name="oldImage" value="{{ $article->image }}">
                @if($article->image)
                    <img src="{{ asset('storage/'. $article->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Body</label>
                <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                <textarea input="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Article</button>
        </form>
    </div>
</div>

@endsection
