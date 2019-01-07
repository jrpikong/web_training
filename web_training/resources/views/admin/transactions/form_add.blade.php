@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Add Transactions</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('add_sales') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                <div class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Order Code</label>
                        <div class="col-lg-10">
                            <input type="text" name="order_code" class="form-control" required>
                            @if ($errors->has('order_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('order_code') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Qty</label>
                        <div class="col-lg-10">
                            <input type="text" name="qty" class="form-control" required>
                            @if ($errors->has('qty'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('qty') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Products</label>
                        <div class="col-lg-10">
                            <select name="product" class="form-control" required>
                                <option value="">Select Products</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }} -- Rp. {{ number_format($product->price) }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('product'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('product') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Invoice Img</label>
                        <div class="col-lg-10">
                            <input type="file" name="invoice_img" required>
                            @if ($errors->has('invoice_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('invoice_img') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush