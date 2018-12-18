@extends('layouts.front')

@section('content')

    <section class="page-header page-header-modern page-header-background page-header-background-sm custom-page-header parallax mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{asset('porto/img/slides/black_bg.png')}}">

    </section>

    <div class="container">
        <div class="row justify-content-center pt-1 pb-4 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{ __('PERJANJIAN FREELANCE SAMSUNG STUDENT AMBASADOR') }}</div>

                    <div class="card-body">
                        @php $dateNow = \Carbon\Carbon::now()->format('d-F-Y'); @endphp
                        <p>Pada hari ini, tanggal  <b>{{$dateNow }}</b> yang bertandatangan di bawah ini : </p>

                        <p>Nama			: <b>Nelly Magdalena</b> </p>
                        <p>Jabatan			: <b>Sr. Manager HRD PT. ACCENTUATES</b> </p>
                        <p>Alamat			: <b>Gedung Satrio Tower Lt. 10, Jl. Prof. Dr. Satrio Kav.1-4 Blok C4 Jakarta 12950</b></p>
                        <p>Selanjutnya di sebut sebagai <b>PIHAK PERTAMA</b> (perwakilan dari PT. Accentuates )</p>

                        <p>Nama : <b>{{ Auth::user()->name }}</b></p>
                        <p>Tempat / Tanggal Lahir : <b>{{ Auth::user()->place_of_birth }} {{ Auth::user()->birth_date }}</b></p>
                        <p>Alamat sesuai KTP: <b>{{ Auth::user()->address }}</b></p>
                        <p>No. HP: <b>{{ Auth::user()->phone_number }}</b></p>
                        <p>Nama Universitas: <b>{{ Auth::user()->university }}</b></p>
                        <p>Jurusan: <b>{{ Auth::user()->majors }}</b></p>
                        <p>Tahun Masuk: <b>{{ Auth::user()->entry_year }}</b></p>

                        <p>Selanjutnya disebut sebagai <b><b>PIHAK KEDUA</b></b> (Freelancer)</p>
                        <p>
                            Dengan ini PIHAK PERTAMA dan <b>PIHAK KEDUA</b> sepakat untuk memenuhi ketentuan-ketentuan dalam perjanjian sebagaimana yang tercantum di dalam pasal-pasal berikut ini:
                        </p>

                        {!! $page->description !!}

                        <p class="text-right"><b>Jakarta, {{$dateNow}} </b></p>

                        <div class="text-right">
                            <form method="POST" action="{{ route('term_and_condition_pos') }}" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-9 col-form-label text-md-right">{{ __('Digital Signature') }}</label>

                                    <div class="col-md-3">
                                        <input id="img_digital_signature" type="file" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="img_digital_signature" value="{{ old('img_digital_signature') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input id="accept" type="checkbox" class="form-check-input{{ $errors->has('accept') ? ' is-invalid' : '' }}" name="accept" value="{{ old('accept') }}" value="Universitas Swasta" required>
                                            <label class="form-check-label" for="accept">
                                                Accept
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('SIGN IT') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection