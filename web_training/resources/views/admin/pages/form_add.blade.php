@extends('layouts.app')


@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Form Input Faq</h5>
        </div>

        <div class="card-body">
            <form-add-page></form-add-page>
        </div>
    </div>
@endsection

@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush