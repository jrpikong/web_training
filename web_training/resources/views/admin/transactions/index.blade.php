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
        <div class="card-body">
            <form method="get">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2">
                                Periode
                            </div>
                            <div class="col-md-2">
                                {{--<input id="date" type="text" placeholder="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autofocus>--}}
                                <select id="date" class="form-control" name="date" required autofocus>
                                    @php
                                        $now = time();
                                        $days = '';
                                    @endphp
                                    @foreach(range(1, 31) as $day)
                                        @php $selected = ($day == date('j', $now)) ? ' selected="selected"' : ''; @endphp
                                        <option value="{{ $day}}" {{$selected}}>{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="month" class="form-control" name="month" required autofocus>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select id="year" class="form-control" name="year" required autofocus>
                                    @php
                                        $years = '';
                                        $startyear = '2018'; // This year
                                        $endyear = date('Y'); // Three years ahead
                                    @endphp
                                    @foreach(range($startyear, $endyear) as $year) {
                                    @php $selected = ($year == date('Y', $now)) ? 'selected="selected"' : ''; @endphp
                                    <option value="{{$year}}" {{$selected}}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2">
                                To
                            </div>
                            <div class="col-md-2">
                                {{--<input id="date" type="text" placeholder="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autofocus>--}}
                                <select id="date" class="form-control" name="date2" required autofocus>
                                    @php
                                        $now = time();
                                        $days = '';
                                    @endphp
                                    @foreach(range(1, 31) as $day)
                                        @php $selected = ($day == date('j', $now)) ? ' selected="selected"' : ''; @endphp
                                        <option value="{{ $day}}" {{$selected}}>{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="month" class="form-control" name="month2" required autofocus>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select id="year" class="form-control" name="year2" required autofocus>
                                    @php
                                        $years = '';
                                        $startyear = '2018'; // This year
                                        $endyear = date('Y'); // Three years ahead
                                    @endphp
                                    @foreach(range($startyear, $endyear) as $year) {
                                    @php $selected = ($year == date('Y', $now)) ? 'selected="selected"' : ''; @endphp
                                    <option value="{{$year}}" {{$selected}}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">

            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Prder Code</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>View</th>
                </thead>

                <tbody>
                @if($transactions)
                    @foreach($transactions as $key => $trasaction)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $trasaction->users->name }} </td>
                            <td> {{ $trasaction->order_code }} </td>
                            <td> {{ $trasaction->products->product_name }} </td>
                            <td> {{ $trasaction->qty }} </td>
                            <td> {{ $trasaction->products->price }} </td>
                            <td> {{ $trasaction->created_at->format('Y-m-d') }} </td>
                            <td> <a href="{{ route('show',$trasaction->id) }}">view</a> </td>
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