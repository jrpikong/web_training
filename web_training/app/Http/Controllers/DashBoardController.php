<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class DashBoardController extends Controller
{
    public function analytic()
    {
        $startDate = \Carbon\Carbon::now()->subYear();
        $endDate = \Carbon\Carbon::now();

        Period::create($startDate, $endDate);
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        dd($analyticsData);

    }
}
