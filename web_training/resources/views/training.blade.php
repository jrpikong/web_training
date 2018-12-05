@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA Training</h5>
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item"><a href="{{route('add_training')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
                </ul>
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
                    <th>Name</th>
                    <th>Level</th>
                    <th>Sort Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($trainings)
                    @foreach($trainings as $key => $training)
                        <tr>
                            <td width="100"> {{ $key + 1 }} </td>
                            <td> {{ $training->training_name }} </td>
                            <td> {{ $training->difficulty }} </td>
                            <td width="400"> {{ $training->descriptions }} </td>
                            <td>
                                @if(Auth::user()->id == 10)
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-info btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></button>

                                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                                        <a href="{{route('add_quiz_training',$training->id)}}" class="dropdown-item">Add Quiz</a>
                                        <a href="{{ route('edit_quiz',$training->id) }}" class="dropdown-item">Edit Quiz</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('edit_training',$training->id) }}" class="dropdown-item">Edit Training</a>
                                        <form action="{{ route('delete_training', $training->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">Delete Training</button>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                <a class="" href="{{route('follow_training',$training->id)}}">Ikuti Training</a>

                            </td>
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