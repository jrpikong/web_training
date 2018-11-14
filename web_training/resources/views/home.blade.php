@extends('layouts.app')

@section('content')
    @if(Auth::user()->id == 10)
        @include('dashboard')
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <h1 class="text-uppercase">Welcome</h1>
                        <img src="{{$user->getFirstMediaUrl('img_profile')}}" class="img-thumbnail" style="height: 151px; width: 114px;">
                        <h3>Please. Choose what do you want todo !</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Personality Test</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Transaction</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Training</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush
