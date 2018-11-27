@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <follow-training-quiz :training-quiz="'{{ json_encode($training_quiz) }}'"></follow-training-quiz>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush