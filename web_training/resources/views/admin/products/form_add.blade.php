@extends('layouts.app')

@section('content')
    @php
        $id = (isset($id)) ? $id : '';
    @endphp
    <form-product :id="'{!! $id !!}'"></form-product>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush