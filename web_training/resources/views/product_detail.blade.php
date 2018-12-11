@extends('layouts.front')

@section('content')
    <section class="page-header page-header-modern bg-color-primary page-header-md">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="col-md-12 col-lg-12">
                    <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
                        @foreach($product_images as $product_image)
                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders">
                                    <img alt="" class="img-fluid" src="{{$product_image->getUrl()}}">
                                </span>
                        </div>
                        @endforeach
                    </div>
                    <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                        @foreach($product_images as $product_image)
                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                   <img alt="Project Image" src="{{$product_image->getUrl()}}" class="img-fluid">
                                </span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="summary entry-summary">

                    <h1 class="mb-0 font-weight-bold text-7">{{ $product->product_name }}</h1>

                    <p class="price">
                        <span class="amount"><i class="fas fa-coins"></i> {{ number_format($product->price,2) }}</span>
                    </p>

                    <p class="mb-4">{{ $product->sort_descriptions }}</p>
                    <div class="product-meta">
                        <span class="posted-in">Categories: {{ $product->product_category->category_name }}.</span>
                    </div>

                </div>


            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="tabs tabs-product mb-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item active"><a class="nav-link py-3 px-4" href="#productDescription" data-toggle="tab">Description</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-4" href="#productInfo" data-toggle="tab">Spesification</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-4" href="#productTecnology" data-toggle="tab">Video</a></li>
                    </ul>
                    <div class="tab-content p-0">
                        <div class="tab-pane p-4 active" id="productDescription">
                            <p class="m-0">{!!  $product->descriptions  !!}</p>
                        </div>
                        <div class="tab-pane p-4" id="productInfo">
                            <table class="table table-bordered m-0">
                                <tbody>
                                @if(count(json_decode($product->spesifications)) > 0)
                                    @foreach(json_decode($product->spesifications) as $key => $spesification)
                                        <tr>
                                            <th class="border-top-0">
                                                {{ $spesification->key }}:
                                            </th>
                                            <td class="border-top-0">
                                                {{ $spesification->value }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane p-4" id="productTecnology">
                            <div class="owl-carousel owl-theme owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'items': 1}" style="height: auto;">

                                <div class="owl-stage-outer">
                                    <div class="owl-stage" >
                                        @foreach($product_tecnology_images as $product_tecnology_image)
                                            <div class="owl-item" style="width: 540px;">
                                                <div>
                                                    <img alt="" class="img-fluid" src="{{$product_tecnology_image->getUrl()}}">
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="owl-nav disabled">
                                    <button type="button" role="presentation" class="owl-prev"></button>
                                    <button type="button" role="presentation" class="owl-next"></button>
                                </div>
                                <iframe style="width: 100%; height: 500px; object-fit: cover"  src="https://www.youtube.com/embed/{{$product->product_video}}?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('porto/js/examples/examples.gallery.js') }}"></script>
@endpush