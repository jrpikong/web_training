<?php

namespace App\Http\Controllers;

use App\ResultPersonalQuiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $city = '';
        $distric = '';
        if (count((array)$request->selected) > 0 ) {
            $selected = json_decode($request->selected);
            $province = $selected->id;
        }

        if (count((array)$request->city) > 0 ) {
            $city = json_decode($request->city);
            $city = $city->id;
        }

        if (count((array)$request->distric) > 0 ) {
            $distric = json_decode($request->distric);
            $distric = $distric->id;
        }
//        dd($distric);
        $members = User::with('provinces','cities','district')->where([
            ['name', 'like', '%' . $request->user_name . '%'],
            ['gender', 'like', '%' . $request->gender . '%'],
            ['university', 'like', '%' . $request->university . '%'],
            ['phone_number', 'like', '%' . $request->phone_number . '%'],
            ['province', 'like', '%'.$province ],
            ['city', 'like', '%'.$city ],
            ['districts', 'like', '%'.$distric ],
            ['grade_point_average', 'like', '%' . $request->ipk . '%'],
            ['birth_date', 'like', '%' . $request->tahun_lahir . '%'],
            ['majors', 'like', '%' . $request->jurusan . '%']
        ])->orderBy('created_at','desc')->get();
        $members->map(function ($data) {
            $data['province'] = $data->provinces[0]->name;
            $data['province_of_birth'] = $data->provinces[0]->name;
            $data['city'] = $data->cities[0]->name;
            $data['districts'] = $data->district[0]->name;
            return $data;
        });
        $json = $members->map(function ($data) {
            return $json = [
                'Nama' => $data->name,
                'Nama Pendek' => $data->nic_name,
                'Tanggal Lahir' => $data->birth_date,
                'Provinsi Lahir' => $data->province_of_birth,
                'Tempat Lahir' => $data->place_of_birth,
                'Jenis Kelamin' => $data->gender,
                'Provinsi' => $data->province,
                'Kota' => $data->city,
                'Kecamatan' => $data->districts,
                'Kode Pos' => $data->postal_code,
                'Alamat' => $data->address,
                'No Telepon' => $data->phone_number,
                'Universitas' => $data->university,
                'ID Identitas' => $data->id_identity,
                'ID Universitas' => $data->id_university,
                'IPK' => $data->grade_point_average,
                'E-Mail' => $data->email,
                'Lulusan' => $data->lulusan,
                'Jurusan' => $data->majors,
                'Tahun Masuk' => $data->entry_year,
                'Rekening Bank Mandiri' => $data->bank_account,
                'Tanggal Berakhir Kontrak' => $data->date_end,
            ];
        });

        return response()->json(
            [
                'data' => $members,
                'json' => $json
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

    public function Delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function getMemberByID($id)
    {
        //ResultPersonalQuiz::with('personality_detail')->where('user_id', '=', $id)->get();

        $member = User::find($id);
        $indonesia = new Indonesia();
        $province = $indonesia->findProvince($member->province);
        $province = $province->name;
        $city = $indonesia->findCity($member->city);
        $city = $city->name;
        $disctric = $indonesia->findDistrict($member->districts);
        $disctric = $disctric->name;
        $personality = DB::table('result_personal_quizzes')
            ->join('result_personal_quiz_details', 'result_personal_quizzes.id', '=', 'result_personal_quiz_details.quiz_result_id')
            ->where('user_id','=',$id)
            ->get();
        return view('admin.members.view', compact('member','province','city','disctric','personality'));
    }
}
