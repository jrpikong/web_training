@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">History Quiz Training</h5>
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item"><a href="{{route('trainings')}}" class="page-link"><i class="icon-file-plus2"></i> Ikuti Kuis</a></li>
                </ul>
            </div>
        </div>

        <div class="table-responsive" style=" min-height: 500px">
            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Training Name</th>
                    <th>Difficulty</th>
                    <th>Skor</th>
                </tr>
                </thead>
                <tbody>
                @if($histories)
                    @foreach($histories as $key => $history)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $history->created_at}} </td>
                            <td> {{ $history->quiz->training_name }} </td>
                            <td> {{ $history->quiz->difficulty }} </td>
                            <td> {{ $history->grade}} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush