@extends('layouts.app')

@section('content')
    <follow-training :id="'{!! $id !!}'"></follow-training>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush