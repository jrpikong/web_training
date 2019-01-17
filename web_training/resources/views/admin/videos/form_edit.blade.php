@extends('layouts.app')


@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Form Input Videos</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('update_video',$video->id) }}" method="post">
                @csrf
                @method('PUT')
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Videos</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Titel</label>
                        <div class="col-lg-10">
                            <input type="text" name="title" class="form-control" required value="{{ $video->title }}">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Url</label>
                        <div class="col-lg-10">
                            <input type="text" name="url" class="form-control" value="{{ $video->url }}" placeholder="input url terakhir youtube ex: mx_dolESHco" required/>
                            @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Page</label>
                        <div class="col-lg-10">
                            <select name="page" class="form-control" required>
                                <option value="">Select Page</option>
                                <option value="all" @if($video->page == "all") selected @endif>All</option>
                                <option value="home" @if($video->page == "home") selected @endif>Home</option>
                                <option value="about_us" @if($video->page == "about_us") selected @endif>About Us</option>
                            </select>
                            @if ($errors->has('page'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('page') }}</strong>
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