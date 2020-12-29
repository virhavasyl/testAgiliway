@extends('layouts.default')
@section('content')
    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form method="POST" action="{{ url('article') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" class="@error('title') is-invalid @enderror">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" class="@error('description') is-invalid @enderror"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" rows="10" name="text" class="@error('text') is-invalid @enderror"></textarea>
            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@stop
