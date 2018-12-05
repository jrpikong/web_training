<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Indonesia;
use Spatie\MediaLibrary\Models\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $indonesia = new Indonesia();
        $province = $indonesia->findProvince($user->province);
        $province = $province->name;
        $city = $indonesia->findCity($user->city);
        $city = $city->name;
        $disctric = $indonesia->findDistrict($user->districts);
        $disctric = $disctric->name;
        return view('home',compact('user','province','city','disctric'));
    }

    public function term_and_condition()
    {
        return view('term_and_condition');
    }

    public function term_and_condition_post(Request $request)
    {
        $this->validate($request, [
            'photo' => 'mimes:jpeg,png,bmp,tiff |max:4096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

        if($request->has('img_digital_signature') === true){
            $user = Auth::user();
            $user->status = 1;
            $user->save();

            $user->addMediaFromRequest('img_digital_signature')->toMediaCollection('img_digital_signature');
            return view('preview_user',compact('user'));
        }
    }
}
