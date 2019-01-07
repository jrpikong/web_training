@extends('layouts.app')


@section('content')
{{--    @dd($training_quiz)--}}
    <training-quiz-edit :data-quiz="{{ json_encode($training_quiz) }}"></training-quiz-edit>
@endsection