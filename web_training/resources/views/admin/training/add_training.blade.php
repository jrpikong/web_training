@extends('layouts.app')


@section('content')
    <div class="card my-3">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Basic form inputs</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('submit_training') }}" enctype="multipart/form-data" method="post">
            @csrf
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Deskripsi Kuis</legend>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Training Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="training_name" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Diffiluct</label>
                    <div class="col-lg-10">
                        <select name="diffiluct" class="form-control" required>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert">Expert</option>
                            <option value="Master">Master</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Descriptions</label>
                    <div class="col-lg-10">
                        <textarea name="descriptions" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">File</label>
                    <div class="col-lg-10">
                        <input type="file" name="file_module" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <select name="status" class="form-control" required>
                            <option value="Activ">Active</option>
                            <option value="InActive">InActive</option>
                        </select>
                    </div>
                </div>

            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>

@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush