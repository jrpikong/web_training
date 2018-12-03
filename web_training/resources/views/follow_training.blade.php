@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA Training </h5>
        </div>
        <div class="card-body">
            <div  style="width: 100%; height: 600px; position: relative; ">
                <iframe  id="iframe" src="http://docs.google.com/gview?url={{ asset($training->file_module) }}&embedded=true" style="width:100%; height:600px;" frameborder="0">
                </iframe>
                <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;">&nbsp;</div>
            </div>
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
    <script>
        var head = $("#iframe").contents().find("head");
        var css = '<style type="text/css">' +
            '.ndfHFb-c4YZDc-Wrql6b{display:none}; ' +
            '</style>';
        $(head).append(css);
    </script>
@endpush