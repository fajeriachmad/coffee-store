@extends('layouts.dashboard.main')

@section('section')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $action === 'create' ? 'Create new' : 'Edit' }} post</h1>
    </div>

    <div class="col-lg-8">
        @if ($action === 'create')
            <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @elseif($action === 'edit')
                <form method="POST" action="/dashboard/posts/{{ $post->slug }}" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
        @endif

        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ isset($post) ? old('title', $post->title) : old('title') }}" autofocus>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ isset($post) ? old('slug', $post->slug) : old('slug') }}" tabindex="-1">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select" id="category" name="category_id">
                @foreach ($categories as $category)
                    @if (isset($post) ? old('category_id', $post->category->id) == $category->id : old('category_id'))
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Post Image</label>
            @if (isset($post) && $post->image)
                <img src="/dist/images/{{ $post->image }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <div class="custom-file">
                <input type="hidden" name="oldImage" value="{{ isset($post->image) ? $post->image : '' }}">
                <input type="file" class="custom-file-input" id="image" name="image"
                    value="{{ isset($post->image) ? $post->image : '' }}">
                <label class="custom-file-label @error('image') is-invalid @enderror" for="image">Choose file</label>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body"
                value="{{ isset($post) ? old('body', $post->body) : old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">{{ $action === 'create' ? 'Create' : 'Edit' }} Post</button>
        <a href="/dashboard/posts" class="btn btn-outline-primary border-3">Back to my posts</a>
        </form>
    </div>
@endsection
