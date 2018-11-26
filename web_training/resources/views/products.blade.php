@extends('layouts.front')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm custom-page-header parallax mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{asset('porto/img/slides/slide-corporate-7-2.jpg')}}">

    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">
                        @if($products)
                            @foreach($products as $key => $product)
                                <div class="col-md-4 col-lg-3">
                                    <article class="post post-medium border-0 pb-0 mb-5">
                                        <div class="post-image">
                                            <a href="{{ route('product_detail',$product->id) }}">
                                                <img src="{{asset($product->getFirstMediaUrl('product_images'))}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                                            </a>
                                        </div>

                                        <div class="post-content">

                                            <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ route('product_detail',$product->id) }}">{{ $product->product_name }}</a></h2>
                                            <p>{{ str_limit($product->sort_descriptions,150,'&raquo') }}</p>

                                            <div class="post-meta">
                                                <span><i class="fas fa-coins"></i> Rp {{ $product->price }} </span> <br>
                                                <span><i class="far fa-folder"></i> Category, {{ $product->product_category->category_name }}</span>
                                                <span class="d-block mt-2"><a href="{{ route('product_detail',$product->id) }}" class="btn btn-xs btn-light text-1 text-uppercase">View More</a></span>
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            {{ $products->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('porto/js/views/view.shop.js') }}"></script>
@endpush
