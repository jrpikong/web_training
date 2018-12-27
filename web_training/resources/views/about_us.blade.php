@extends('layouts.front')

@section('content')
    <section class="page-header page-header-modern bg-color-primary page-header-md">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>

    <div class="container pt-5">

        <div class="row py-4 mb-2">
            <div class="col-md-12 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">About Us</h2>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">{!! $about->title !!}</p>

                    </div>
                    <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-12 mx-auto">
                                <div class="thumb-gallery">
                                    <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <iframe style="width: 100%; height: 100%; object-fit: cover"  src="https://www.youtube.com/embed/o1D7ouNIgTs?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                                </span>
                                        </div>
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <iframe style="width: 100%; height: 100%; object-fit: cover"  src="https://www.youtube.com/embed/U1qLerI9Kzo?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                                </span>
                                        </div>
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <iframe style="width: 100%; height: 100%; object-fit: cover"  src="https://www.youtube.com/embed/be7QGWQnJVg?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                                </span>
                                        </div>
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <iframe style="width: 100%; height: 100%; object-fit: cover"  src="https://www.youtube.com/embed/WOPehPhfHS4?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                                </span>
                                        </div>
                                    </div>
                                    <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                   <img alt="Project Image" src="http://img.youtube.com/vi/o1D7ouNIgTs/hqdefault.jpg" class="img-fluid">
                                </span>
                                        </div>
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                   <img alt="Project Image" src="http://img.youtube.com/vi/U1qLerI9Kzo/hqdefault.jpg" class="img-fluid">
                                </span>
                                        </div>
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                    <img alt="Project Image" src="http://img.youtube.com/vi/be7QGWQnJVg/hqdefault.jpg" class="img-fluid">
                                </span>
                                        </div>
                                        <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                    <img alt="Project Image" src="http://img.youtube.com/vi/WOPehPhfHS4/hqdefault.jpg" class="img-fluid">
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                <div>{!! $about->description !!}</div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('porto/js/examples/examples.gallery.js') }}"></script>
@endpush