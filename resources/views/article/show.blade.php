@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="{{ route('article.index') }}" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my article</a>
            <h1 class="mb-3">{{ $article->title }}</h1>

            @if ($article->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/'. $article->image) }}" class="img-fluid mt-3">
            </div>
            @else
            @endif

            <article class="my-3 fs-5">
                {!! $article->content !!}
                {{-- {{ $post->body }} --}}
            </article>
        </div>
    </div>
@endsection
