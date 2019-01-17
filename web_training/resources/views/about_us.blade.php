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
                                        @if(!$videos->isEmpty())
                                            @foreach($videos as $video)
                                                <div>
                                                    <span class="img-thumbnail img-thumbnail-no-borders d-block">
                                                        <iframe style="width: 100%; height: 100%; object-fit: cover"  src="https://www.youtube.com/embed/{{ $video->url }}?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                                    @if(!$videos->isEmpty())
                                        @foreach($videos as $video)
                                            <div>
                                                    <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                                       <img alt="Project Image" src="http://img.youtube.com/vi/{{ $video->url }}/hqdefault.jpg" class="img-fluid">
                                                    </span>
                                            </div>
                                        @endforeach
                                    @endif
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