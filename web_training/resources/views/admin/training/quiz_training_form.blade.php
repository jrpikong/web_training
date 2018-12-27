@extends('layouts.app')


@section('content')
    <training-quiz-form :id-quiz="'{{ $id_training }}'"></training-quiz-form>
@endsection