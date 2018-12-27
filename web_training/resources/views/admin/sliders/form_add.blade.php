@extends('layouts.app')


@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Form Input Slider</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('submit_slider') }}" enctype="multipart/form-data" method="post">
                @csrf
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                @endif
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Sliders</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Caption</label>
                        <div class="col-lg-10">
                            <input type="text" name="caption" class="form-control" required>
                            @if ($errors->has('caption'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('caption') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="image">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </fieldset>

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