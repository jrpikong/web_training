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
        $province = '';
        if (count((array)$request->selected) > 0 ) {
            $selected = json_decode($request->selected);
            $province = $selected->id;
        }

        $members = User::where([
            ['name', 'like', '%' . $request->user_name . '%'],
            ['gender', 'like', '%' . $request->gender . '%'],
            ['university', 'like', '%' . $request->university . '%'],
            ['phone_number', 'like', '%' . $request->phone_number . '%'],
            ['province', 'like', '%'.$province ],
            ['grade_point_average', 'like', '%' . $request->ipk . '%'],
            ['birth_date', 'like', '%' . $request->tahun_lahir . '%'],
            ['majors', 'like', '%' . $request->jurusan . '%']
        ])->get();

        return response()->json(
            [
                'data' => $members
            ]
        );
    }

    public function get_province()
    {
        $indonesia = new Indonesia();
        $provinces = $indonesia->allProvinces();
        $provinces->map(function ($data) {
            return $data['label'] = $data->name;
        });
        return response()->json(
            [
                'data' => $provinces
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
