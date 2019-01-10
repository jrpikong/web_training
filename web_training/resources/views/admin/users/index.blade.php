@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List Logs Transactions</h5>
            @if(Auth::user()->role_id == 2)
                <div class="header-elements">
                    <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                        <li class="page-item"><a href="{{route('create_user')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
                    </ul>
                </div>
            @endif


        </div>
        <div class="table-responsive">

            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </thead>

                <tbody>
                @if($users)
                    @foreach($users as $key => $user)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td>
                                @if($user->role_id == 2)
                                    Super Admin
                                @elseif($user->role_id ==3)
                                    Operator
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-outline-primary btn-block mb-2" href="{{route('edit_user',$user->id)}}" class="">
                                    <i class="icon-pencil4 mr-2"></i>
                                    Edit</a>
                                <form action="{{ route('delete_user', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-block" type="submit">
                                        <i class="icon-database-remove mr-2"></i>Delete
                                    </button>
                                </form>
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