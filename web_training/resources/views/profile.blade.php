@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-1 pb-4 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr><td width="300">Name</td><td width="2"> : </td> <td>{{ $user->name }} {{ $user->nic_name }}</td></tr>
                            <tr><td width="300">Birth Date</td><td width="2"> : </td> <td>{{ $user->birth_date }} {{ $user->place_of_birth }} {{ $province_of_birth }}</td></tr>
                            <tr><td width="300">Gender</td><td width="2"> : </td> <td>{{ $user->gender }}</td></tr>
                            <tr><td width="300">Phone Number</td><td width="2"> : </td> <td>{{ $user->phone_number }}</td></tr>
                            <tr><td width="300">University</td><td width="2"> : </td> <td>{{ $user->university }}</td></tr>
                            <tr><td width="300">Majors</td><td width="2"> : </td> <td>{{ $user->majors }}</td></tr>
                            <tr><td width="300">Entry Year</td><td width="2"> : </td> <td>{{ $user->entry_year }}</td></tr>
                            <tr><td width="300">ID University</td><td width="2"> : </td> <td>{{ $user->id_university }}</td></tr>
                            <tr><td width="300">Email</td><td width="2"> : </td> <td>{{ $user->email }}</td></tr>
                            <tr><td width="300">Bank Account</td><td width="2"> : </td> <td>{{ $user->bank_account }}</td></tr>
                            <tr><td width="300">ID Identity (KTP)</td><td width="2"> : </td> <td>{{ $user->id_identity }}</td></tr>
                            <tr><td width="300">Address</td><td width="2"> : </td> <td>{{ $user->address }} {{ $user->postal_code }} {{ $disctric }} {{ $city }} {{ $province }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
