@extends('layouts.default')
@section('content')
    <form method="POST" action="{{ url("article/$article->id") }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" class="@error('title') is-invalid @enderror" value="{{ $article->title }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" class="@error('description') is-invalid @enderror">{{ $article->description }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" rows="10" name="text" class="@error('text') is-invalid @enderror">{{ $article->text }}</textarea>
            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop
