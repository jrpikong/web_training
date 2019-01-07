@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Detail Transaction</h5>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        {{ $transaction->users->name }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Order Code</label>
                    <div class="col-lg-10">
                        {{ $transaction->order_code }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Qty</label>
                    <div class="col-lg-10">
                        {{ $transaction->qty }}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Products</label>
                    <div class="col-lg-10">
                        {{ $transaction->products->product_name }}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Invoice Img</label>
                    <div class="col-lg-10">
                        <img src="{{ asset('storage/'.$transaction->invoice_img) }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush