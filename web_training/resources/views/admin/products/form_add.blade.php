@extends('layouts.app')

@section('content')
    <form-product></form-product>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush