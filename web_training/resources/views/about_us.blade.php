@extends('layouts.front')

@section('content')
    <section class="page-header page-header-modern bg-color-primary page-header-md">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="row pb-4">
        <div class="col">
            <hr class="solid my-5">

            <h4 class="mb-0">About Us</h4>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-4 mx-auto">
                    <div class="thumb-gallery">
                        <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
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
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('porto/js/examples/examples.gallery.js') }}"></script>
@endpush