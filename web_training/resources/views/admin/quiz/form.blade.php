@extends('layouts.app')


@section('content')
    <form-quiz></form-quiz>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush