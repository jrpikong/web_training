@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA Training </h5>
        </div>
        <div class="card-body">
            <iframe src ="{{ asset($training->file_module) }}" width="100%" height="600px"></iframe>
            <div class="text-center pt-3">
                <h1>Jika Merasa Sudah Cukup Memahami dan Menguasai, Silahkan Klik "TEST" Dibawah Ini Untuk Mengetahui Tingkat Penguasaaan Materi</h1>
                <a href="{{ route('follow_test',$training->id) }}" class="btn btn-dark btn-block">TEST</a>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush