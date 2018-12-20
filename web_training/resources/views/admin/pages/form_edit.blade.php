@extends('layouts.app')


@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Form Edit Page</h5>
        </div>

        <div class="card-body">
            <form-edit-page :page="'{{ $page }}'"></form-edit-page>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush