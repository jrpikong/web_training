@extends('layouts.app')


@section('content')
    <list-member></list-member>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush