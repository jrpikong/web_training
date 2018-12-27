@extends('layouts.app')

@section('content')
    @if($data)
        <div class="card my-3">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">SSA Personal Training </h5>
            </div>
            <div class="card-body">
                <h1 class="text-center"> Maaf Anda Sudah Pernah Mengikuti Test Ini</h1>
            </div>
        </div>
    @else
        <start-quiz></start-quiz>
    @endif
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
    <script src="{{asset('limitless/assets/js/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <script src="{{asset('limitless/assets/js/global_assets/js/demo_pages/form_layouts.js')}}"></script>
@endpush