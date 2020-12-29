@extends('layouts.default')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ url('article/create') }}" class="btn btn-primary">Create new article</a>
    @foreach ($articles as $article)
        <div class="card">
            <div class="card-header">
                {{ $article->title }}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $article->description }}</p>
                <a href="{{ url("article/$article->id") }}" class="btn btn-primary">Open</a>
                <a href="{{ url("/article/$article->id/edit") }}" class="btn btn-primary">Edit</a>
                <form action="{{ url("article/$article->id") }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $articles->links() }}
@stop
