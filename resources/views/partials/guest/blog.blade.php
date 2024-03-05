<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">News</h1>
                    <p>Find about our activities.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="col-lg-6 col-md-6 single-blog">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img class="embed-responsive-item" src="/dist/images/{{ $post->image }}" alt="">
                        </div>
                        <ul class="post-tags">
                            <li><a href="#">{{ $post->category->name }}</a></li>
                        </ul>
                        <a href="#">
                            <h4>{{ $post->title }}</h4>
                        </a>
                        <p>
                            {{ $post->excerpt }}
                        </p>
                        <p class="post-date">
                            {{ date('D M, Y', strtotime($post->created_at)) }}
                        </p>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 d-flex justify-content-center single-menu">
                    <p>No posts yet.</p>
                </div>
            @endif
        </div>
    </div>
</section>
