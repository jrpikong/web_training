<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::get();
        return view('admin.faq.index', compact('faq'));
    }

    public function add()
    {
        return view('admin.faq.form_add');
    }

    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;

        $faq->save();

        try {
            return back()->with('success','You have successfully add faq.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error add faq.');
        }
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.form_edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;

        $faq->save();

        try {
            return back()->with('success','You have successfully update faq.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error update faq.');
        }
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        try {
            return back()->with('success','You have successfully delete faq.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error delete faq.');
        }
    }
}
