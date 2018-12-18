<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.form_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $page = new Page();
        $page->name = $request->name;
        $page->slug = str_slug($request->name,'-');
        $page->title = $request->title;
        $page->status = $request->status;
        $page->description = $request->description;

        $page->save();

        try {
            return response()->json([
                'status' => '00',
                'message' => 'Insert Success',
                'data' => $page,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => '04',
                'message' => 'Insert Failed',
                'data' => $page,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.form_edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
//        $page = $page::find($page);
        $page->name = $request->name;
        $page->title = $request->title;
        $page->status = $request->status;
        $page->description = $request->description;

        $page->save();

        try {
            return response()->json([
                'status' => '00',
                'message' => 'Update Success',
                'data' => $page,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => '04',
                'message' => 'Update Failed',
                'data' => $page,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page_ = $page::find($page)->each->delete();

        try {
            return back()->with('success','You have successfully delete Product.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error delete Product.');
        }
    }
}
