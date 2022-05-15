@extends('layouts.layout')

@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Dashboard</h1>
</div>

<h2>Section Articlele</h2>
<a href="{{ route('article.create') }}" class="btn btn-success">Add Article</a>
<div class="table-responsive">
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($article as $item)
        <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->user->name }}</td>
                <td>
                    <a href="{{ route('article.show', $item->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('article.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('article.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
</div>
@endsection
