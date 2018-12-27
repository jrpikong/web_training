<?php

namespace App\Http\Controllers;

use App\Training;
use App\User;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class DashBoardController extends Controller
{
    public function analytic()
    {
//        dd(Period::days(7));
        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(6));
        $analyticsDatas[] = ['date','pageview','visitors'];
        foreach ($analyticsData as $i => $item) {
            $analyticsDatas[] =[$this->getFromDateAttribute($item['date']),$item['pageViews'],$item['visitors']];
        }
        return response()->json([
            'status' => '00',
            'message' => 'Get Success',
            'visitors' => $analyticsDatas,
            'users' => User::count(),
            'total_training' => Training::count(),
        ]);
    }

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
