@extends('layouts.dashboard.main')

@section('section')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-outline-success">
                    <span data-feather="arrow-left"></span>
                    Back to my post
                </a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-outline-warning">
                    <span data-feather="edit"></span>
                    Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf

                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                        <span data-feather="trash-2" class="text-white"></span>
                        Delete
                    </button>
                </form>

                @if ($post->image)
                    <div class="img-container">
                        <img src="/dist/images/{{ $post->image }}" class="img-fluid mt-3"
                            style="width: 1200px; height:400px;" alt="image">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?programming" class="img-fluid mt-3" alt="...">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/dashboard/posts" class="btn btn-outline-success">
                    <span data-feather="arrow-left"></span>
                    Back to my post
                </a>
            </div>
        </div>
    </div>
@endsection
