@extends('layouts.app')

@section('content')
    @if(isset($id))
        @php
            $id = (isset($id)) ? $id : '';
        @endphp
        <edit-form-product :id="'{!! $id !!}'"></edit-form-product>
    @else
        <form-product :id="0"></form-product>
    @endif
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush