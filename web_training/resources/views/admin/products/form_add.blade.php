@extends('layouts.app')

@section('content')
    @php
        $id = (isset($id)) ? $id : '';
    @endphp

    @if(isset($id))
        <edit-form-product :id="'{!! $id !!}'"></edit-form-product>
    @else
        <form-product :id="'{!! $id !!}'"></form-product>
    @endif
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush