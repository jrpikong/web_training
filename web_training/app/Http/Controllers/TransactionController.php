<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $dateStart = ($request->year || $request->month || $request->date) ? $request->year . '-'.$request->month . '-' . $request->date :'';
        $dateEnd = ($request->year2 || $request->month2 || $request->date2) ? $request->year2 . '-'.$request->month2 . '-' . $request->date2 :'';
        $transactions = Transaction::with('users', 'products')->where('user_id','=',$userId);
        if (!empty($dateStart) && !empty($dateEnd)) {
            $transactions = $transactions->whereBetween(DB::raw('DATE(created_at)'),[$dateStart,$dateEnd]);
        }
        $transactions = $transactions->paginate(50);
        return view('admin.transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.transactions.form_add',compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = '';
        if ($request->invoice_img) {
            $request->validate([
                'file_module' => 'file|max:10120',
            ]);
            $fileName = "module".time().'.'.request()->invoice_img->getClientOriginalExtension();
            $pathName = $request->invoice_img->storeAs('public/invoice',$fileName);
        }
        $trx = new Transaction();
        $trx->user_id = Auth::user()->id;
        $trx->qty = $request->qty;
        $trx->product_id = $request->product;
        $trx->invoice_img = 'invoice/'.$fileName;
        $trx->order_code = $request->order_code;
        $trx->save();


        try {
            return back()->with('success','You have successfully add transaction.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error add transaction.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaction = $transaction->load('users', 'products');
        return view('admin.transactions.view',compact('transaction'));
    }

    public function sales(Request $request)
    {
        $dateStart = ($request->year || $request->month || $request->date) ? $request->year . '-'.$request->month . '-' . $request->date :'';
        $dateEnd = ($request->year2 || $request->month2 || $request->date2) ? $request->year2 . '-'.$request->month2 . '-' . $request->date2 :'';
        $transactions = Transaction::with('users', 'products');
        if (!empty($dateStart) && !empty($dateEnd)) {
            $transactions = $transactions->whereBetween(DB::raw('DATE(created_at)'),[$dateStart,$dateEnd]);
        }

        $transactions = $transactions->paginate(50);
        return view('admin.transactions.index',compact('transactions'));
    }
}
