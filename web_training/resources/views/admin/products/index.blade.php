@extends('layouts.app')

@section('content')
        <div class="card my-3">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">List Members</h5>
                <div class="header-elements">
                    <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                        <li class="page-item"><a href="{{route('add_product')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-xs table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sort Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($products)
                        @foreach($products as $key => $product)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $product->product_name }} </td>
                                <td> Rp. {{ number_format($product->price,2) }} </td>
                                <td> {{ $product->sort_descriptions}} </td>
                                <td> {{ $product->product_category->category_name }} </td>
                                <td>
                                    <a class="btn btn-outline-primary btn-block mb-2" href="{{route('edit_product',$product->id)}}" class="">
                                        <i class="icon-pencil4 mr-2"></i>
                                        Edit</a>
                                    <form action="{{ route('delete_product', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-block" type="submit"><i class="icon-database-remove mr-2"></i>Delete</button>
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