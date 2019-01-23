<?php

namespace App\Http\Controllers;

use App\Exports\LogTransactionExport;
use App\LogTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LogTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dateStart = ($request->year || $request->month || $request->date) ? $request->year . '-'.$request->month . '-' . $request->date :'';
        $dateEnd = ($request->year2 || $request->month2 || $request->date2) ? $request->year2 . '-'.$request->month2 . '-' . $request->date2 :'';
        if ($request->export == 'export') {
            return $this->export($request);
        }
        $users = LogTransaction::select('user_id', DB::raw('count(*) as total'))->with('users');

        if (!empty($dateStart) && !empty($dateEnd)) {
            $users = $users->whereBetween(DB::raw('DATE(created_at)'),[$dateStart,$dateEnd]);
        }

        $users = $users->groupBy('user_id')->paginate(15);
        return view('admin.logs.index',compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogTransaction  $logTransaction
     * @return \Illuminate\Http\Response
     */
    public function show($logTransaction)
    {
        $detailLogs = LogTransaction::where('user_id',$logTransaction)->with('users')->orderBy('created_at','desc')->paginate(15);

        return view('admin.logs.view',compact('detailLogs'));
    }

    public function export($request)
    {
        $dateStart = ($request->year || $request->month || $request->date) ? $request->year . '-'.$request->month . '-' . $request->date :'';
        $dateEnd = ($request->year2 || $request->month2 || $request->date2) ? $request->year2 . '-'.$request->month2 . '-' . $request->date2 :'';
        $fileName = Carbon::now()->toDateTimeString().'.xls';
//        $filename = 'meal_list_'.date('YmdHis').'.xls';
        Excel::store(new LogTransactionExport($dateStart,$dateEnd), $fileName,'public');
        return redirect( Storage::url("{$fileName}" ));
    }
}
