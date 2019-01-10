@extends('layouts.app')

@section('content')
@if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
    @include('dashboard')
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($gracePeriode)
                <form action="{{ route('extend_account') }}" method="post">
                    @csrf
                    <div class="alert alert-warning alert-styled-right alert-dismissible">
                        <button type="submit" class="close"><span>Perpanjang</span></button>
                        <span class="font-weight-semibold">Warning!</span> Akun Anda Akan Habis Masa Aktif Pada Tanggal {{ Auth::user()->date_end }} <a href="{{ route('ssa_agreement') }}" class="alert-link">cek perjanjian</a>
                    </div>
                </form>
            @endif

                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                @endif
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <h1 class="text-uppercase">Welcome</h1>
                        <img src="{{$user->getFirstMediaUrl('img_profile')}}" class="img-thumbnail" style="height: 151px; width: 114px;">
                        <h3>Please. Choose what do you want todo !</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <a href="{{ route('start_quiz') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Personality Test</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{ route('transaction') }}" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Transaction</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{ route('trainings') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Training</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @if(!Auth::user()->bank_account)
                        <div class="col-md-12">
                            @if ($message = Session::get('success'))

                                <div class="alert alert-success alert-block">

                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <strong>{{ $message }}</strong>

                                </div>

                            @endif
                            <h3 class="text-center">
                                Segera Buka Rekenning Di <span class="text-uppercase">Bank Mandiri</span> Untuk Keperluan Pembayaran Insentif Anda Nantinya ! <br>
                                Jika Sudah Membuka dan Memiliki Nomor Rekening <span class="text-uppercase"> Dibank Mandiri </span>, Silahkan Masukkan Nomor Rekening Tersebut Pada Kotak di Bawah Ini
                            </h3>
                            <form class="" method="post" action="{{ route('update_bank_account',Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="input-group mb-3">
                                    <input type="text" placeholder="fill your mandiri bank account" name="bank_account" value="{{ Auth::user()->bank_account }}" class="form-control {{ $errors->has('bank_account') ? ' is-invalid' : '' }}">

                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><button type="submit" class="btn btn-primary btn-block">Simpan</button></span>
                                    </div>
                                    @if ($errors->has('bank_account'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bank_account') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </form>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush
