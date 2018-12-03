@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-body">
            @if(empty($training_quiz))
                <h2>Kuis Belum Tersedia</h2>
            @endif
            <follow-training-quiz :training-quiz="'{{ json_encode($training_quiz) }}'"></follow-training-quiz>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush