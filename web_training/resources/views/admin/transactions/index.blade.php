@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List Logs Transactions</h5>
            @if(Auth::user()->id != 10)
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item"><a href="{{route('add_sales')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
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
                            <td> {{ $trasaction->products->product_name }} </td>
                            <td> {{ $trasaction->qty }} </td>
                            <td> {{ $trasaction->products->price }} </td>
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