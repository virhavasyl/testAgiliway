@extends('layouts.default')
@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->text }}</p>

    <a href="{{ url("/article/$article->id/edit") }}" class="btn btn-primary">Edit</a>
@stop
