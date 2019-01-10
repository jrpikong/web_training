@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA FAQ</h5>
            <div class="header-elements">
                @if(Auth::user()->role_id == 2)
                    <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                        <li class="page-item"><a href="{{route('add_faq')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    @if(Auth::user()->role_id == 2)
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(!$faq->isEmpty())
                    @foreach($faq as $key => $item)
                        <tr>
                            <td width="100"> {{ $key + 1 }} </td>
                            <td> {{ $item->title }} </td>
                            <td> {{ $item->description }}</td>
                            <td> @if($item->status) Active @else In Active @endif </td>
                            @if(Auth::user()->role_id == 2)
                            <td> <a href="{{route('edit_faq',$item->id)}}" class="btn btn-outline-primary btn-block mb-2" >Edit</a>
                                <form action="{{ route('delete_faq', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-block" type="submit">Delete</button>
                                </form>
                            </td>
                            @endif
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


