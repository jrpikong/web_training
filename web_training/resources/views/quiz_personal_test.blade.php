@extends('layouts.app')

@section('content')
    <start-quiz></start-quiz>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
    <script src="{{asset('limitless/assets/js/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <script src="{{asset('limitless/assets/js/global_assets/js/demo_pages/form_layouts.js')}}"></script>
@endpush