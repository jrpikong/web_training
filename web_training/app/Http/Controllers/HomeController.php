<?php

namespace App\Http\Controllers;

use App\LogTransaction;
use App\Page;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $current = Carbon::now();
        $province = $indonesia->findProvince($user->province);
        $province = $province->name;
        $city = $indonesia->findCity($user->city);
        $city = $city->name;
        $disctric = $indonesia->findDistrict($user->districts);
        $disctric = $disctric->name;
        $gracePeriode = false;
        $alertDate = $current->parse($user->date_end);

        if ($alertDate->subDays(5) <= $current) {
            $gracePeriode = true;
        }
        return view('home',compact('user','province','city','disctric','gracePeriode'));
    }

    public function profile()
    {
        $user = Auth::user();
        $indonesia = new Indonesia();
        $province = $indonesia->findProvince($user->province);
        $province_of_birth = $indonesia->findProvince($user->province_of_birth);
        $province_of_birth = $province_of_birth->name;
        $province = $province->name;
        $city = $indonesia->findCity($user->city);
        $city = $city->name;
        $disctric = $indonesia->findDistrict($user->districts);
        $disctric = $disctric->name;
        return view('profile',compact('user','province','city','disctric','province_of_birth'));
    }
    public function term_and_condition()
    {
        $page = Page::where('slug', 'like', '%term-and-condition%')->first();
        return view('term_and_condition',compact('page'));
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

    public function updateBankAccount(Request $request, $id)
    {
        $this->validate($request, [
            'bank_account' => 'required|max:13|min:13',
        ]);

        $user = User::find($id);
        $user->bank_account = $request->input('bank_account');
        $user->save();

        try {
            return back()->with('success','You have successfully Update Back Account.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error Update Back Account.');
        }
    }

    public function ssaAgreement()
    {
        $user = Auth::user();
        return view('ssa_agreement',compact('user'));
    }

    public function transaction()
    {
        $id = Auth::user()->id;
        $log_transaction = new LogTransaction();
        $log_transaction->user_id = $id;
        $log_transaction->total = 1;
        $log_transaction->save();
        $url = 'https://www.blibli.com/promosi/pel-student-promotor-samsung';
        return Redirect::away($url);
    }

    public function extendAccount(Request $request)
    {
        $current = Carbon::now();
        $trialExpires = $current->addMonth(3)->toDateString();
        $user = User::find(Auth::user()->id);
        $user->date_end = $trialExpires;
        $user->save();

        try {
            return back()->with('success','Akun Anda Berhasil Diperpanjang Sampai. '. $trialExpires);
        } catch (Exception $e) {
            return back()->with('Failed','Perpanjang Akun Gagal');
        }
    }
}
