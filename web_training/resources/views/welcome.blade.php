@extends('layouts.front')

@section('content')
    <div class="slider-container rev_slider_wrapper" style="height: 100vh;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1170, 'gridheight': 700, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }}">
            <ul>
                <li class="" data-transition="fade">
                    <img src="{{asset('porto/img/slides/slide-corporate-7-1.jpg')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    {{--<div class="tp-caption"--}}
                         {{--data-x="center" data-hoffset="['-165','-165','-165','-215']"--}}
                         {{--data-y="center" data-voffset="['-110','-110','-110','-135']"--}}
                         {{--data-start="1000"--}}
                         {{--data-transform_in="x:[-300%];opacity:0;s:500;"--}}
                         {{--data-transform_idle="opacity:0.2;s:500;"><img src="{{asset('porto/img/slides/slide-title-border.png')}}" alt=""></div>--}}

                    {{--<div class="tp-caption text-color-light font-weight-normal"--}}
                         {{--data-x="center"--}}
                         {{--data-y="center" data-voffset="['-110','-110','-110','-135']"--}}
                         {{--data-start="700"--}}
                         {{--data-fontsize="['22','22','22','40']"--}}
                         {{--data-lineheight="['25','25','25','45']"--}}
                         {{--data-transform_in="y:[-50%];opacity:0;s:500;">WE ROCK AND WE MAKE</div>--}}

                    {{--<div class="tp-caption"--}}
                         {{--data-x="center" data-hoffset="['165','165','165','215']"--}}
                         {{--data-y="center" data-voffset="['-110','-110','-110','-135']"--}}
                         {{--data-start="1000"--}}
                         {{--data-transform_in="x:[300%];opacity:0;s:500;"--}}
                         {{--data-transform_idle="opacity:0.1;s:500;"><img src="{{asset('porto/img/slides/slide-title-border.png')}}" alt=""></div>--}}

                    {{--<h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"--}}
                        {{--data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'--}}
                        {{--data-x="center"--}}
                        {{--data-y="center" data-voffset="['-60','-60','-60','-85']"--}}
                        {{--data-fontsize="['50','50','50','90']"--}}
                        {{--data-lineheight="['55','55','55','95']">AWESOME DESIGNS</h1>--}}

                    {{--<div class="tp-caption font-weight-light text-center"--}}
                         {{--data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'--}}
                         {{--data-x="center"--}}
                         {{--data-y="center" data-voffset="['-10','-10','-10','-25']"--}}
                         {{--data-fontsize="['18','18','18','50']"--}}
                         {{--data-lineheight="['29','29','29','40']"--}}
                         {{--style="color: #b5b5b5;">Porto is a huge success in the of one of the world’s largest MarketPlace.</div>--}}

                    {{--<a class="tp-caption btn btn-light font-weight-bold text-color-primary"--}}
                       {{--href="/login"--}}
                       {{--data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'--}}
                       {{--data-x="center" data-hoffset="['-120','-120','-120','-195']"--}}
                       {{--data-y="center" data-voffset="['65','65','65','210']"--}}
                       {{--data-paddingtop="['15','15','15','30']"--}}
                       {{--data-paddingbottom="['15','15','15','30']"--}}
                       {{--data-paddingleft="['33','33','33','50']"--}}
                       {{--data-paddingright="['33','33','33','50']"--}}
                       {{--data-fontsize="['13','13','13','25']"--}}
                       {{--data-lineheight="['20','20','20','25']">LOGIN</a>--}}

                    {{--<a class="tp-caption btn btn-primary font-weight-bold"--}}
                       {{--href="/register"--}}
                       {{--data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'--}}
                       {{--data-x="center" data-hoffset="['90','90','90','165']"--}}
                       {{--data-y="center" data-voffset="['65','65','65','210']"--}}
                       {{--data-paddingtop="['15','15','15','30']"--}}
                       {{--data-paddingbottom="['15','15','15','30']"--}}
                       {{--data-paddingleft="['33','33','33','50']"--}}
                       {{--data-paddingright="['33','33','33','50']"--}}
                       {{--data-fontsize="['13','13','13','25']"--}}
                       {{--data-lineheight="['20','20','20','25']">GET STARTED NOW <i class="fas fa-arrow-right ml-1"></i></a>--}}

                </li>
                <li class="" data-transition="fade">
                    <img src="{{asset('porto/img/slides/slide-corporate-7-2.jpg')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    {{--<div class="tp-caption"--}}
                         {{--data-x="center" data-hoffset="['-115','-115','-115','-185']"--}}
                         {{--data-y="center" data-voffset="['-110','-110','-110','-135']"--}}
                         {{--data-start="1000"--}}
                         {{--data-transform_in="x:[-300%];opacity:0;s:500;"--}}
                         {{--data-transform_idle="opacity:0.2;s:500;"><img src="{{asset('porto/img/slides/slide-title-border.png')}}" alt=""></div>--}}

                    {{--<div class="tp-caption text-color-light font-weight-normal"--}}
                         {{--data-x="center"--}}
                         {{--data-y="center" data-voffset="['-110','-110','-110','-135']"--}}
                         {{--data-start="700"--}}
                         {{--data-fontsize="['22','22','22','40']"--}}
                         {{--data-lineheight="['25','25','25','45']"--}}
                         {{--data-transform_in="y:[-50%];opacity:0;s:500;">HELLO, THIS IS</div>--}}

                    {{--<div class="tp-caption"--}}
                         {{--data-x="center" data-hoffset="['115','115','115','185']"--}}
                         {{--data-y="center" data-voffset="['-110','-110','-110','-135']"--}}
                         {{--data-start="1000"--}}
                         {{--data-transform_in="x:[300%];opacity:0;s:500;"--}}
                         {{--data-transform_idle="opacity:0.2;s:500;"><img src="{{asset('porto/img/slides/slide-title-border.png')}}" alt=""></div>--}}

                    {{--<div class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"--}}
                         {{--data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'--}}
                         {{--data-x="center"--}}
                         {{--data-y="center" data-voffset="['-60','-60','-60','-85']"--}}
                         {{--data-fontsize="['50','50','50','90']"--}}
                         {{--data-lineheight="['55','55','55','95']">PORTO HTML TEMPLATE</div>--}}

                    {{--<div class="tp-caption font-weight-light text-center"--}}
                         {{--data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'--}}
                         {{--data-x="center"--}}
                         {{--data-y="center" data-voffset="['-10','-10','-10','-25']"--}}
                         {{--data-fontsize="['18','18','18','50']"--}}
                         {{--data-lineheight="['29','29','29','40']"--}}
                         {{--style="color: #b5b5b5;">Trusted by over <strong>30,000</strong> satisfied users.</div>--}}

                    {{--<a class="tp-caption btn btn-primary font-weight-bold"--}}
                       {{--href="/register"--}}
                       {{--data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'--}}
                       {{--data-x="center"--}}
                       {{--data-y="center" data-voffset="['65','65','65','210']"--}}
                       {{--data-paddingtop="['15','15','15','30']"--}}
                       {{--data-paddingbottom="['15','15','15','30']"--}}
                       {{--data-paddingleft="['33','33','33','50']"--}}
                       {{--data-paddingright="['33','33','33','50']"--}}
                       {{--data-fontsize="['13','13','13','25']"--}}
                       {{--data-lineheight="['20','20','20','25']">GET STARTED NOW <i class="fas fa-arrow-right ml-1"></i></a>--}}

                </li>
            </ul>
        </div>
    </div>

    <div class="home-intro mb-0" id="home-intro">
        <div class="container">

            <div class="row text-center">
                <div class="col">
                    <p class="mb-0">
                        WHY JOIN <span class="highlighted-word text-color-light font-weight-semibold text-5">SAMSUNG STUDENT AMBASADOR ?</span>
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
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
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
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
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
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                            <div class="feature-box-icon">
                                <i class="icon-star icons text-color-primary"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="mb-2">HELP YOUR FRIENDS OUT</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-5 mb-2 mt-2">
            <div class="col text-center">
                <a href="#" class="btn btn-primary btn-px-5 py-3 font-weight-semibold text-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">LEARN MORE</a>
            </div>
        </div>
    </div>

    <section class="section section-no-border row mt-5 mb-5 pt-5 pb-5" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between pb-5 pb-lg-0">
                <div class="col-lg-5 order-2 order-lg-1 pt-4 pt-lg-0 pb-5 pb-lg-0 mt-5 mt-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                    <h2 class="font-weight-semibold mb-0">JOIN SAMSUNG STUDENT AMBASADOR</h2>
                    <p class="lead font-weight-light text-color-dark text-4">Kesempatan membangun mental.</p>
                    <p class="font-weight-light text-color-dark text-2 mb-4 opacity-7">Kesempatan membangun mental entrepreneurship dan memperoleh penghasilan yang lumayan bagi para mahasiswa atau yang fresh graduate.</p>
                    <a href="{{ route('login') }}" class="btn btn-dark-scale-2 btn-px-5 btn-py-2 text-2">JOIN NOW</a>
                </div>
                <div class="col-md-6 col-lg-5 offset-lg-1 order-1 order-lg-2 scale-2">
                    <div class="owl-carousel owl-theme nav-style-1 stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'margin': 25, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">
                        <div class="p-4">
                            <div class="videoWrapper">
                                <iframe style="width: 100%; height: auto; object-fit: cover"  src="https://www.youtube.com/embed/U1qLerI9Kzo?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="videoWrapper">
                                <iframe style="width: 100%; height: auto; object-fit: cover" src="https://www.youtube.com/embed/be7QGWQnJVg?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="videoWrapper">
                                <iframe style="width: 100%; height: auto; object-fit: cover" src="https://www.youtube.com/embed/WOPehPhfHS4?rel=0&hd=1&modestbranding=1" allowfullscreen></iframe>
                            </div>
                        </div>
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
                                        {{--<span class="thumb-info-caption p-4">--}}
                                            {{--<span class="custom-thumb-info-title">--}}
                                                {{--<span class="custom-thumb-info-type font-weight-light text-4">{{ $product->product_name }}</span>--}}
                                                {{--<span class="custom-thumb-info-inner font-weight-semibold text-5">{{ $product->price }}</span>--}}
                                                {{--<i class="icon-arrow-right-circle icons font-weight-semibold text-5 "></i>--}}
                                            {{--</span>--}}
                                        {{--</span>--}}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="section-secondary">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="owl-carousel owl-theme nav-bottom rounded-nav" data-plugin-options="{'items': 1, 'loop': false, 'dots': false}">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 pt-4 mt-3">
                            <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-0">
                                <div class="testimonial-quote">“</div>
                                <blockquote>
                                    <p class="font-weight-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non.</p>
                                </blockquote>
                                <div class="testimonial-author">
                                    <p class="text-uppercase">
                                        <strong>John Smith</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 pt-4 mt-3">
                            <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-0">
                                <div class="testimonial-quote">“</div>
                                <blockquote>
                                    <p class="font-weight-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non.</p>
                                </blockquote>
                                <div class="testimonial-author">
                                    <p class="text-uppercase">
                                        <strong>John Smith</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection