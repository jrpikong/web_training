@extends('layouts.app')


@section('content')
    <list-quiz></list-quiz>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush