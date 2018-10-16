@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="fill your full name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nick Name') }}</label>

                            <div class="col-md-6">
                                <input id="nic_name" type="text" placeholder="fill your nic name" class="form-control{{ $errors->has('nic_name') ? ' is-invalid' : '' }}" name="nic_name" value="{{ old('nic_name') }}" required autofocus>

                                @if ($errors->has('nic_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nic_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input id="date" type="text" placeholder="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autofocus>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="month" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" value="{{ old('month') }}" required autofocus>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="year" type="text" placeholder="year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Place Of Birth') }}</label>

                            <div class="col-md-6">
                                <select id="province_of_birth" class="form-control{{ $errors->has('province_of_birth') ? ' is-invalid' : '' }}" name="province_of_birth" value="{{ old('province_of_birth') }}" required autofocus>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('province_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province_of_birth') }}</strong>
                                    </span>
                                @endif

                                <input id="place_of_birth" style="margin-top: 15px" type="text" class="form-control{{ $errors->has('place_of_birth') ? ' is-invalid' : '' }}" name="place_of_birth" value="{{ old('place_of_birth') }}" placeholder="specific place of birth" required autofocus>

                                @if ($errors->has('place_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autofocus>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <div>
                                    <select id="provinces" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" value="{{ old('province') }}" required autofocus>
                                        <option value="">select your province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('province'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div style="margin-top: 15px">
                                    <select id="cities"  class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>
                                        <option value="">select your city</option>
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div style="margin-top: 15px">
                                    <select id="districts" style="margin-top: 15px" class="form-control{{ $errors->has('districts') ? ' is-invalid' : '' }}" name="districts" value="{{ old('districts') }}" required autofocus>
                                        <option value="">select your district</option>
                                    </select>
                                    @if ($errors->has('districts'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('districts') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div style="margin-top: 15px">
                                    <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="fill your specific address" required autofocus></textarea>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div style="margin-top: 15px">
                                    <input type="text" id="postal_code" style="margin-top: 15px" placeholder="fill your postal code" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required autofocus>
                                    @if ($errors->has('postal_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>fill your specific address</textarea>--}}
                                {{--@if ($errors->has('address'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('address') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" placeholder="fill your phone number" value="{{ old('phone_number') }}" required autofocus>
                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>

                            <div class="col-md-6">
                                <input id="university" type="text" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}" placeholder="fill your university" name="university" value="{{ old('university') }}" required autofocus>
                                @if ($errors->has('university'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type Of University') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="university_negri" type="radio" class="form-check-input{{ $errors->has('university') ? ' is-invalid' : '' }}" name="type_of_university" value="{{ old('university') }}" value="Universitas Negri" required>
                                    <label class="form-check-label" for="university_negri">
                                        Negeri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="university_swasta" type="radio" class="form-check-input{{ $errors->has('university') ? ' is-invalid' : '' }}" name="type_of_university" value="{{ old('university') }}" value="Universitas Swasta" required>
                                    <label class="form-check-label" for="university_swasta">
                                        Swasta
                                    </label>
                                </div>

                                @if ($errors->has('university'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID Identity') }}</label>

                            <div class="col-md-6">
                                <input id="id_identity" type="text" placeholder="fill your id identity" class="form-control{{ $errors->has('id_identity') ? ' is-invalid' : '' }}" name="id_identity" value="{{ old('id_identity') }}" required autofocus>
                                @if ($errors->has('id_identity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_identity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID University') }}</label>

                            <div class="col-md-6">
                                <input id="id_university" type="text" placeholder="fill your  id university" class="form-control{{ $errors->has('id_university') ? ' is-invalid' : '' }}" name="id_university" value="{{ old('id_university') }}" required autofocus>
                                @if ($errors->has('id_university'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image Profile') }}</label>

                            <div class="col-md-6">
                                <input id="img_profile" type="file" class="form-control{{ $errors->has('img_profile') ? ' is-invalid' : '' }}" name="img_profile" value="{{ old('img_profile') }}" required autofocus>
                                @if ($errors->has('img_profile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img_profile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image Student Card') }}</label>

                            <div class="col-md-6">
                                <input id="img_student_card" type="file" class="form-control{{ $errors->has('img_student_card') ? ' is-invalid' : '' }}" name="img_student_card" value="{{ old('img_student_card') }}" required autofocus>
                                @if ($errors->has('img_student_card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img_student_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image Identity Card') }}</label>

                            <div class="col-md-6">
                                <input id="img_identity" type="file" class="form-control{{ $errors->has('img_identity') ? ' is-invalid' : '' }}" name="img_identity" value="{{ old('img_identity') }}" required autofocus>
                                @if ($errors->has('img_identity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img_identity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Grade Point Average') }}</label>

                            <div class="col-md-6">
                                <select id="grade_point_average" class="form-control{{ $errors->has('grade_point_average') ? ' is-invalid' : '' }}" name="grade_point_average" value="{{ old('grade_point_average') }}" required autofocus>
                                    <option value="< 2">< 2</option>
                                    <option value="2 - 2,5">2 - 2,5</option>
                                    <option value="> 2,5 - 3">> 2,5 - 3</option>
                                    <option value="> 3 - 3,5">> 3 - 3,5</option>
                                    <option value="> 3,5 - 4">> 3,5 - 4 </option>
                                </select>

                                @if ($errors->has('grade_point_average'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grade_point_average') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="fill your email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="fill your password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="fill your confirm password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next Step') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            $('#province_of_birth').select2();
            const provinces = $('#provinces')
            const cities = $('#cities')
            const districts = $('#districts')
            provinces.select2(
                {   placeholder: "select your province",
                    allowClear: true
                }
            ).on('select2:select', getCity);

            function getCity(event)
            {
                $.ajax({
                    type: 'GET',
                    url: '/api/cities?province='+event.params.data.id,
                    success: function(event, response) {
                        if (response) {

                            cities.empty().select2({
                                placeholder: "select your city",
                                data: $.map(response.cities, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            });

                            districts.empty().select2({
                                placeholder: "select your districts",
                                data: $.map(response.districts, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            });

                        } else {
                            console.log('should not add this category');
                        }
                    }.bind(null, event),
                    error: function() {
                        alert('Failed to assign category!');
                    }
                });
            }
        })
    </script>

@endpush