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
                    <th>Name</th>
                    <th>Date Click</th>
                </tr>
                </thead>

                <tbody>
                @if($detailLogs)
                    @foreach($detailLogs as $key => $detailLog)
                        <tr>
                            <td> {{ $detailLog->users->name }} </td>
                            <td> {{ $detailLog->created_at }} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <ul class="pagination align-self-center">
                {{ $detailLogs->links() }}
            </ul>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush