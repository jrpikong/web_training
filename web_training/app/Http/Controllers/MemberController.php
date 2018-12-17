<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Indonesia;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.members.index');
    }

    public function getMember(Request $request)
    {
        $members = User::where([
            ['name', 'like', '%' . $request->user_name . '%'],
            ['gender', 'like', '%' . $request->gender . '%'],
            ['university', 'like', '%' . $request->university . '%'],
            ['phone_number', 'like', '%' . $request->phone_number . '%']
        ])->get();

        return response()->json(
            [
                'data' => $members
            ]
        );
    }

    public function getMemberByID($id)
    {

        $member = User::find($id);
        $indonesia = new Indonesia();
        $province = $indonesia->findProvince($member->province);
        $province = $province->name;
        $city = $indonesia->findCity($member->city);
        $city = $city->name;
        $disctric = $indonesia->findDistrict($member->districts);
        $disctric = $disctric->name;
        return view('admin.members.view', compact('member','province','city','disctric'));
    }
}
