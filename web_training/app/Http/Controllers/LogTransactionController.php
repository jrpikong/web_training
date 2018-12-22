<?php

namespace App\Http\Controllers;

use App\LogTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = LogTransaction::select('user_id', DB::raw('count(*) as total'))
        ->with('users')->groupBy('user_id')->paginate(15);
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
        $detailLogs = LogTransaction::with('users')->orderBy('created_at','desc')->paginate(15);

        return view('admin.logs.view',compact('detailLogs'));
    }
}
