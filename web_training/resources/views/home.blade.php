@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">You Personal Data</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>=</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Nama Panggilian</td>
                            <td>=</td>
                            <td>{{$user->nic_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>=</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Nomor HP / WA</td>
                            <td>=</td>
                            <td>{{$user->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td>=</td>
                            <td>{{$user->place_of_birth}} - {{$user->birth_date}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>=</td>
                            <td>{{$user->gender}}</td>
                        </tr>
                        <tr>
                            <td>Nama Universitas</td>
                            <td>=</td>
                            <td>{{$user->university}}</td>
                        </tr>
                        <tr>
                            <td>Nomor KTP</td>
                            <td>=</td>
                            <td>{{$user->id_identity}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Identitas Mahasiswa</td>
                            <td>=</td>
                            <td>{{$user->id_university}}</td>
                        </tr>
                        <tr>
                            <td>IPK</td>
                            <td>=</td>
                            <td>{{$user->grade_point_average}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>=</td>
                            <td>{{ $province.' - '.$city.' - '.$disctric }} - {{$user->address}} {{$user->postal_code}}</td>
                        </tr>
                        <tr>
                            <td>Foto diri</td>
                            <td>=</td>
                            <td><img src="{{$user->getFirstMediaUrl('img_profile','thumb')}}" class="img-thumbnail"></td>
                        </tr>
                        <tr>
                            <td>Digital Signature</td>
                            <td>=</td>
                            <td><img src="{{$user->getFirstMediaUrl('img_digital_signature')}}" class="img-thumbnail"></td>
                        </tr>
                        <tr>
                            <td>Foto kartu mahasiswa</td>
                            <td>=</td>
                            <td><img src="{{$user->getFirstMediaUrl('img_student_card')}}" class="img-thumbnail"></td>
                        </tr>
                        <tr>
                            <td>Upload scan KTP</td>
                            <td>=</td>
                            <td><img src="{{$user->getFirstMediaUrl('img_identity')}}" class="img-thumbnail"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
