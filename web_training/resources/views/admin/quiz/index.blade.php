@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA Training</h5>
            <div class="header-elements">
                @if(Auth::user()->id == 10)
                    <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                        <li class="page-item"><a href="{{route('add_quiz')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
                    </ul>
                @endif
            </div>
        </div>

        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

        @endif
        <div class="table-responsive" style=" min-height: 500px">
            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Waktu Pengerjaan</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                </tr>
                </thead>
                <tbody>
                @if($quizzes)
                    @foreach($quizzes as $key => $quiz)
                        <tr>
                            <td width="100"> {{ $key + 1 }} </td>
                            <td> {{ $quiz->waktu }} </td>
                            <td> {{ $quiz->status }} </td>
                            <td> {{ $quiz->created_at }} </td>
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
