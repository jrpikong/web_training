@extends('layouts.app')


@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Basic form inputs</h5>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form action="{{ route('update_training',$training->id) }}" enctype="multipart/form-data" method="post">
                @method('PATCH')
                @csrf
                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                @endif
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Deskripsi Kuis</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Training Name</label>
                        <div class="col-lg-10">
                            <input type="text" name="training_name" value="{{ $training->training_name }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Category</label>
                        <div class="col-lg-10">
                            <select name="diffiluct" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="SSA Knowledge" @if($training->difficulty=="SSA Knowledge") selected @endif>SSA Knowledge</option>
                                <option value="Product Knowledge" @if($training->difficulty=="Product Knowledge") selected @endif>Product Knowledge</option>
                                <option value="Selling Skill" @if($training->difficulty=="Selling Skill") selected @endif>Selling Skill</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Descriptions</label>
                        <div class="col-lg-10">
                            <textarea name="descriptions" class="form-control" required>{{ $training->descriptions }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">File</label>
                        <div class="col-lg-10">
                            <input type="file" name="file_module" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select name="status" class="form-control" required>
                                <option value="Active" @if($training->status=="Active") selected @endif>Active</option>
                                <option value="InActive" @if($training->status=="InActive") selected @endif>InActive</option>
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