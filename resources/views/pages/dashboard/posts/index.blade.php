@extends('layouts.dashboard.main')

@section('section')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts Management</h1>
    </div>

    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
        <li class="nav-item">
            <a id="form-tab" class="nav-link" data-toggle="tab" href="#post-form">
                <span id="action"></span>
                Post
            </a>
        </li>
        <li class="nav-item">
            <a id="manage-tab" class="nav-link active" data-toggle="tab" href="#post-manage">Manage Post</a>
        </li>
    </ul>

    <div class="tab-content border">
        <div id="post-form" class="container tab-pane fade"><br>
            <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                <span id="error-messages"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="post-form" class="mb-5" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" autofocus>
                    <div id="title-error" class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" tabindex="-1">
                    <div id="slug-error" class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="custom-select" id="category_id" name="category_id">
                        <option value="select" selected disabled>-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div id="category_id-error" class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label for="image">Post Image</label>
                    <img id="post-thumbnail" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    <div class="custom-file">
                        <input type="hidden" name="old_image" id="old_image">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">
                            Choose file
                        </label>
                        <div id="image-error" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <p id="body-error" class="text-danger"></p>
                    <input id="body" type="hidden" name="body">
                    <trix-editor class="is-invalid" input="body"></trix-editor>
                </div>

                <button id="action-button" type="submit" class="btn btn-primary"></button>
                <button id="cancel-button" type="button" class="btn btn-outline-primary">Cancel</button>
            </form>


























        </div>
        <div id="post-manage" class="container tab-pane active"><br>
            <div class="tab-pane fade show active" id="pills-manage" role="tabpanel" aria-labelledby="tab-manage">
                <div class="table-responsive">
                    {{-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span>
                        Create</a> --}}
                    <table id="post-table" class="table table-striped table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                                {{-- <th scope="col" colspan="3">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td> --}}

                            {{-- <td>
                                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary">
                                            <span data-feather="eye" class="text-white"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning">
                                            <span data-feather="edit" class="text-white"></span>
                                        </a>
                                        <button class="badge bg-warning border-0"
                                            onclick="getPost('{{ $post->slug }}')">
                                            <span data-feather="edit" class="text-white"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf

                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Are you sure?')">
                                                <span data-feather="trash-2" class="text-white"></span>
                                            </button>
                                        </form>
                                    </td> --}}

                            {{-- </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/dist/pages/dashboard/posts/js/script.js"></script>
@endsection
