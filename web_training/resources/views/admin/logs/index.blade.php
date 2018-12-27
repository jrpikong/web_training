@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List Logs Transactions</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @if($users)
                    @foreach($users as $key => $user)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $user->users->name }} </td>
                            <td> {{ $user->total }} </td>
                            <td>
                                <a class="btn btn-outline-primary btn-block mb-2" href="{{route('show_transactions',$user->user_id)}}" class="">View</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <ul class="pagination align-self-center">
                {{ $users->links() }}
            </ul>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush