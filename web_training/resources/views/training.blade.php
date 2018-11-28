@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA Training</h5>
            {{--<div class="header-elements">--}}
                {{--<ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">--}}
                    {{--<li class="page-item"><a href="{{route('add_product')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>

        <div class="table-responsive">
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
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $training->training_name }} </td>
                            <td> {{ $training->difficulty }} </td>
                            <td> {{ $training->descriptions}} </td>
                            <td> <a class="" href="{{route('follow_training',$training->id)}}">Ikuti Training</a> </td>
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