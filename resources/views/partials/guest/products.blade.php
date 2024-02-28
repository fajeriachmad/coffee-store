<section class="menu-area section-gap" id="coffee">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">What kind of Coffee we serve for you</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($products->count())
                @foreach ($products as $product)
                    <div class="col-lg-4">
                        <div class="single-menu">
                            <div class="title-div justify-content-between d-flex">
                                <h4>{{ $product->name }}</h4>
                                <p class="price float-right">
                                    ${{ $product->price }}
                                </p>
                            </div>
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 d-flex justify-content-center single-menu">
                    <p>No products available.</p>
                </div>
            @endif
        </div>
    </div>
</section>
