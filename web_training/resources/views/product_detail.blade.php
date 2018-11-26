@extends('layouts.front')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm custom-page-header parallax mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{asset('porto/img/slides/slide-corporate-7-2.jpg')}}">

    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="owl-carousel owl-theme owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'items': 1}" style="height: auto;">

                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1080px, 0px, 0px); transition: all 0s ease 0s; width: 3780px;">
                            @foreach($product_images as $product_image)
                            <div class="owl-item" style="width: 540px;">
                                <div>
                                    <img alt="" class="img-fluid" src="{{$product_image->getUrl()}}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"></button>
                        <button type="button" role="presentation" class="owl-next"></button>
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
                        <li class="nav-item"><a class="nav-link py-3 px-4" href="#productTecnology" data-toggle="tab">Product Tecnology</a></li>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection