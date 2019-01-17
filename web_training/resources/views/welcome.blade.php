@extends('layouts.front')

@section('content')
    @if(!$sliders->isEmpty())
    <div class="slider-container rev_slider_wrapper" style="height: 700px;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 700, 'disableProgressBar': 'on', 'navigation': {'bullets': {'enable': true, 'direction': 'vertical', 'h_align': 'right', 'v_align': 'center', 'space': 5}, 'arrows': {'enable': false}}}">
            <ul>
                @foreach($sliders as $i => $slider)
                <li data-transition="fade">
                    <img src="{{ asset( 'storage/'.$slider->image) }}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">
                </li>
                @endforeach

                {{--<li data-transition="fade">--}}
                    {{--<img src="{{asset('porto/img/slides/slide-corporate-7-2.jpg')}}"--}}
                         {{--alt=""--}}
                         {{--data-bgposition="center center"--}}
                         {{--data-bgfit="cover"--}}
                         {{--data-bgrepeat="no-repeat"--}}
                         {{--class="rev-slidebg">--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
    @endif

    <div class="home-intro mb-0" id="home-intro">
        <div class="container">

            <div class="row text-center">
                <div class="col">
                    <p class="mb-0">
                        WHY JOIN <span class="highlighted-word text-color-light font-weight-semibold text-5">SAMSUNG STUDENT AMBASSADOR ?</span>
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="container py-4">
        <div class="row pt-4 mt-5">
            <div class="col">
                <div class="row pt-2 clearfix">
                    <div class="col-lg-6">
                        <div class="feature-box feature-box-style-2 reverse appear-animation" data-appear-animation="fadeInRightShorter">
                            <div class="feature-box-icon">
                                <i class="icon-user-following icons text-color-primary"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="mb-2">TOP 10 Global Brand</h4>
                                <p class="mb-4">Samsung merupakan satu dari10 merek dan perusahaan terbaik dunia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeftShorter">
                            <div class="feature-box-icon">
                                <i class="icon-layers icons text-color-primary"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="mb-2">EARN EXTRA INCOME</h4>
                                <p class="mb-4">Dapat memiliki penghasilan tambahan yang lumayan besar.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feature-box feature-box-style-2 reverse appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                            <div class="feature-box-icon">
                                <i class="icon-calculator icons text-color-primary"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="mb-2">FLEXIBLE WORKING TIME</h4>
                                <p class="mb-4">Waktu kerja yang fleksibel dan dapat dilakukan di mana.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                            <div class="feature-box-icon">
                                <i class="icon-star icons text-color-primary"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="mb-2">INCREASE ENTREPRENEURSHIP SKILL</h4>
                                <p class="mb-4">Membangun dan mengembangkan karakter dan keterampilan wirausaha.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-5 mb-2 mt-2">
            <div class="col text-center">
                <a href="{{ route('aboutUs') }}" class="btn btn-primary btn-px-5 py-3 font-weight-semibold text-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">LEARN MORE</a>
            </div>
        </div>
    </div>

    <section class="section section-no-border row mt-5 mb-5 pt-5 pb-5" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between pb-5 pb-lg-0">
                <div class="col-lg-5 order-2 order-lg-1 pt-4 pt-lg-0 pb-5 pb-lg-0 mt-5 mt-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                    <h2 class="font-weight-semibold mb-0">JOIN SAMSUNG STUDENT AMBASSADOR</h2>
                    <p class="lead font-weight-light text-color-dark text-4">Kesempatan membangun mental.</p>
                    <p class="font-weight-light text-color-dark text-2 mb-4 opacity-7">Kesempatan membangun mental entrepreneurship dan memperoleh penghasilan yang lumayan bagi para mahasiswa atau yang fresh graduate.</p>
                    <a href="{{ route('register') }}" class="btn btn-dark-scale-2 btn-px-5 btn-py-2 text-2">JOIN NOW</a>
                </div>
                <div class="col-md-6 col-lg-5 offset-lg-1 order-1 order-lg-2 scale-2">
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
    </section>

    <section class="team pb-2">
        <div class="container">
            <div class="row pt-4">
                <div class="col">
                    <h2 class="font-weight-semibold mb-0">Products</h2>
                    {{--<p class="lead font-weight-normal">Our Specialists</p>--}}

                    <div id="porfolioAjaxBoxMedical" class="ajax-box ajax-box-init mb-4">

                        <div class="bounce-loader">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>

                        <div class="ajax-box-content" id="porfolioAjaxBoxContentMedical"></div>

                    </div>

                </div>
            </div>
            <div class="row pb-4">
                <div class="owl-carousel owl-theme nav-bottom rounded-nav pl-1 pr-1" data-plugin-options="{'items': 4, 'loop': false, 'dots': false, 'nav': true}">
                    @if($products)
                        @foreach($products as $product)
                            <div class="pr-3 pl-3">
                                <a href="{{ route('product_detail',$product->id) }}" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
                                        <span class="thumb-info-wrapper m-0">
                                            <img src="{{asset($product->getFirstMediaUrl('product_images'))}}" class="img-fluid" style="height: 200px;" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('porto/js/examples/examples.gallery.js') }}"></script>
@endpush