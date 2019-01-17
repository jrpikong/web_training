@extends('layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Update Data Member</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('update_user_member',$user->id) }}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" placeholder="fill your full name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

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
                        <input id="nic_name" type="text" placeholder="fill your nick name" class="form-control{{ $errors->has('nic_name') ? ' is-invalid' : '' }}" name="nic_name" value="{{ $user->nic_name }}" required autofocus>

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
                                {{--<input id="date" type="text" placeholder="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autofocus>--}}
                                <select id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" required autofocus>
                                    @php
                                        $now = strtotime($user->birth_date);
                                        $days = '';
                                    @endphp
                                    @foreach(range(1, 31) as $day)
                                        @php $selected = ($day == date('d', $now)) ? ' selected="selected"' : ''; @endphp
                                        <option value="{{ $day}}" {{$selected}}>{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="month" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" value="{{ old('month') }}" required autofocus>
                                    <option value="01" @if(date('m', $now)=='01') selected="selected" @endif>January</option>
                                    <option value="02" @if(date('m', $now)=='02') selected="selected" @endif>February</option>
                                    <option value="03" @if(date('m', $now)=='03') selected="selected" @endif>March</option>
                                    <option value="04" @if(date('m', $now)=='04') selected="selected" @endif>April</option>
                                    <option value="05" @if(date('m', $now)=='05') selected="selected" @endif>May</option>
                                    <option value="06" @if(date('m', $now)=='06') selected="selected" @endif>June</option>
                                    <option value="07" @if(date('m', $now)=='07') selected="selected" @endif>July</option>
                                    <option value="08" @if(date('m', $now)=='08') selected="selected" @endif>August</option>
                                    <option value="09" @if(date('m', $now)=='09') selected="selected" @endif>September</option>
                                    <option value="10" @if(date('m', $now)=='10') selected="selected" @endif>October</option>
                                    <option value="11" @if(date('m', $now)=='11') selected="selected" @endif>November</option>
                                    <option value="12" @if(date('m', $now)=='12') selected="selected" @endif>December</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" required autofocus>
                                    @php
                                        $years = '';
                                        $startyear = '1980'; // This year
                                        $endyear = date('Y', mktime(0,0,0,0,0,date('Y')-15)); // Three years ahead
                                    @endphp
                                    @foreach(range($startyear, $endyear) as $year) {
                                    @php $selected = ($year == date('Y', $now)) ? 'selected="selected"' : ''; @endphp
                                    <option value="{{$year}}" {{$selected}}>{{ $year }}</option>
                                    @endforeach
                                </select>
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

                        <input id="place_of_birth" style="margin-top: 15px" type="text" class="form-control{{ $errors->has('place_of_birth') ? ' is-invalid' : '' }}" name="place_of_birth" value="{{ $user->place_of_birth }}" placeholder="specific place of birth" required autofocus>

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
                        <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required autofocus>
                            <option value="male" @if($user->gender =='male') selected @endif> Male</option>
                            <option value="female" @if($user->gender =='female') selected @endif>Female</option>
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
                            <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="fill your specific address" required autofocus>{{ $user->address }}</textarea>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                            @endif
                        </div>

                        <div style="margin-top: 15px">
                            <input type="text" id="postal_code" style="margin-top: 15px" placeholder="fill your postal code" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ $user->postal_code }}" required autofocus>
                            @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                        </span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" placeholder="fill your phone number" value="{{ $user->phone_number }}" required autofocus>
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('EDUCATIONAL STATUS') }}</label>

                    <div class="col-md-6">
                        <div>
                            <select id="lulusan" class="form-control{{ $errors->has('lulusan') ? ' is-invalid' : '' }}" name="lulusan" value="{{ old('lulusan') }}" required autofocus>
                                <option value="">choose your educational status</option>
                                <option value="student" @if($user->lulusan =='student') selected @endif >student</option>
                                <option value="fresh graduated" @if($user->lulusan =='fresh graduated') selected @endif > fresh graduated</option>
                            </select>
                            @if ($errors->has('lulusan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lulusan') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div style="margin-top: 15px">
                            <input id="university" type="text" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}" placeholder="fill your university" name="university" value="{{ $user->university }}" required autofocus>
                            @if ($errors->has('university'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('university') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-check">
                            <input id="university_negri" type="radio" @if($user->university=='Universitas Negri') checked @endif class="form-check-input{{ $errors->has('university') ? ' is-invalid' : '' }}" name="type_of_university" value="Universitas Negri" required>
                            <label class="form-check-label" for="university_negri">
                                Negeri
                            </label>
                        </div>

                        <div class="form-check">
                            <input id="university_swasta" @if($user->university=='Universitas Swasta') checked @endif type="radio" class="form-check-input{{ $errors->has('university') ? ' is-invalid' : '' }}" name="type_of_university"  value="Universitas Swasta" required>
                            <label class="form-check-label" for="university_swasta">
                                Swasta
                            </label>
                        </div>

                        @if ($errors->has('university'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('university') }}</strong>
                            </span>
                        @endif

                        <div style="margin-top: 15px">
                            <input id="majors" type="text" class="form-control{{ $errors->has('majors') ? ' is-invalid' : '' }}" placeholder="fill your majors" name="majors" value="{{ $user->majors }}" required autofocus>
                            @if ($errors->has('majors'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('majors') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div style="margin-top: 15px">
                            <input id="entry_year" type="text" class="form-control{{ $errors->has('entry_year') ? ' is-invalid' : '' }}" placeholder="fill your entry year" name="entry_year" value="{{ $user->entry_year }}" required autofocus>
                            @if ($errors->has('entry_year'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('entry_year') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div style="margin-top: 15px">
                            <select id="grade_point_average" class="form-control{{ $errors->has('grade_point_average') ? ' is-invalid' : '' }}" name="grade_point_average" value="{{ old('grade_point_average') }}" required autofocus>
                                <option value="">choose your grade point average</option>
                                <option value="New Student">New Student</option>
                                <option value="< 2" @if($user->grade_point_average=='< 2') selected="selected" @endif>< 2</option>
                                <option value="2 - 2,5" @if($user->grade_point_average=='2 - 2,5') selected="selected" @endif>2 - 2,5</option>
                                <option value="> 2,5 - 3" @if($user->grade_point_average=='> 2,5 - 3') selected="selected" @endif>> 2,5 - 3</option>
                                <option value="> 3 - 3,5" @if($user->grade_point_average=='> 3 - 3,5') selected="selected" @endif>> 3 - 3,5</option>
                                <option value="> 3,5 - 4" @if($user->grade_point_average=='> 3,5 - 4') selected="selected" @endif>> 3,5 - 4 </option>
                            </select>

                            @if ($errors->has('grade_point_average'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('grade_point_average') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID University') }}</label>

                    <div class="col-md-6">
                        <input id="id_university" type="text" placeholder="fill your  id university" class="form-control{{ $errors->has('id_university') ? ' is-invalid' : '' }}" name="id_university" value="{{ $user->id_university }}" required autofocus>

                        @if ($errors->has('id_university'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('id_university') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Bank Account') }}</label>

                    <div class="col-md-6">
                        <input id="bank_account" type="text" placeholder="fill your bank account prefer BANK MANDIRI" class="mt-2 form-control{{ $errors->has('bank_account') ? ' is-invalid' : '' }}" minlength="13" maxlength="13" name="bank_account" value="{{ $user->bank_account }}">

                        @if ($errors->has('bank_account'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank_account') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID Identity (KTP)') }}</label>

                    <div class="col-md-6">
                        <input id="id_identity" type="text" placeholder="fill your id identity (nomor KTP)" class="form-control{{ $errors->has('id_identity') ? ' is-invalid' : '' }}" name="id_identity" value="{{ $user->id_identity }}" required autofocus>
                        @if ($errors->has('id_identity'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('id_identity') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="fill your email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
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
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush