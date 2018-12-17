@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">SSA Training</h5>
            <div class="header-elements">
                @if(Auth::user()->id == 10)
                    <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                        <li class="page-item"><a href="{{route('add_sliders')}}" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
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
                    <th>Caption</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($sliders)
                    @foreach($sliders as $key => $slider)
                        <tr>
                            <td width="100"> {{ $key + 1 }} </td>
                            <td> {{ $slider->caption }} </td>
                            <td> <img src="{{ asset( 'storage/'.$slider->image) }}" class="img-thumbnail" width="300px" height="300px"> </td>
                            <td> @if($slider->status) Active @else In Active @endif </td>
                            <td> <a href="" class="btn btn-outline-primary btn-block mb-2" >Edit</a>
                                <form action="{{ route('delete_slider', $slider->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-block" type="submit">Delete</button>
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
