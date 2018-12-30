@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List Logs Transactions</h5>
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item"><a href="{{route('add_sales')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
                </ul>
            </div>
        </div>

        <div class="table-responsive">

            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                </thead>

                <tbody>
                @if($transactions)
                    @foreach($transactions as $key => $trasaction)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $trasaction->users->name }} </td>
                            <td> {{ $trasaction->produts->name }} </td>
                            <td> {{ $trasaction->qty }} </td>
                            <td> {{ $trasaction->product->price }} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <ul class="pagination align-self-center">
                {{ $transactions->links() }}
            </ul>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush