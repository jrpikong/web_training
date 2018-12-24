@extends('layouts.app')

@section('content')
   <dashboard></dashboard>
@endsection

@push('script')
   <script src="{{asset('limitless/assets/js/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
   <script src="{{asset('limitless/assets/js/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
   <script src="{{asset('limitless/assets/js/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
   <script src="{{asset('limitless/assets/js/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
   <script src="{{asset('limitless/assets/js/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
   <script src="{{asset('limitless/assets/js/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
   <script src="{{asset('limitless/assets/js/app.js')}}"></script>
   <script src="{{asset('limitless/assets/js/global_assets/js/demo_pages/dashboard.js')}}"></script>
@endpush
