<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravolt\Indonesia\Indonesia;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/term_and_condition';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->indonesia = new Indonesia();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $provinces = $this->indonesia->allProvinces();
        return view('auth.register',compact('provinces'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nic_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',
//            'province_of_birth' => 'required',
//            'place_of_birth' => 'required',
//            'gender' => 'required',
//            'province' => 'required',
//            'city' => 'required',
//            'districts' => 'required',
//            'postal_code' => 'required',
//            'address' => 'required',
            'phone_number' => 'required|unique:users',
//            'university' => 'required',
//            'type_of_university' => 'required',
//            'id_identity' => 'required',
//            'id_university' => 'requiotal View Minggu Inired',
//            'img_profile' => 'required|mimes:jpeg,jpg,png',
//            'img_student_card' => 'required|mimes:jpeg,jpg,png',
//            'img_identity' => 'required|mimes:jpeg,jpg,png',
//            'grade_point_average' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'nic_name' => $data['nic_name'],
            'email' => $data['email'],
            'birth_date' => $data['year'].'-'.$data['month'].'-'.$data['date'],
            'province_of_birth' => $data['province_of_birth'],
            'place_of_birth' => $data['place_of_birth'],
            'gender' => $data['gender'],
            'province' => $data['province'],
            'city' => $data['city'],
            'districts' => $data['districts'],
            'postal_code' => $data['postal_code'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'university' => $data['university'],
            'type_of_university' => $data['type_of_university'],
            'id_identity' => $data['id_identity'],
            'id_university' => $data['id_university'],
            'grade_point_average' => $data['grade_point_average'],
            'password' => Hash::make($data['password']),
            'status' => 0,
        ]);
        if (isset($data['img_profile'])) {
            $user->addMediaFromRequest('img_profile')->toMediaCollection('img_profile');
        }
        if (isset($data['img_student_card'])) {
            $user->addMediaFromRequest('img_student_card')->toMediaCollection('img_student_card');
        }
        if (isset($data['img_identity'])) {
            $user->addMediaFromRequest('img_identity')->toMediaCollection('img_identity');
        }
         return $user;
    }
}
