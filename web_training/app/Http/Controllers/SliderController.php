<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function addSlider()
    {
        return view('admin.sliders.form_add');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'status' => 'required',
            'image' => 'required|file|max:10120',
        ]);
        $fileName = "sliders_".time().'.'.request()->image->getClientOriginalExtension();
        $pathName = $request->image->storeAs('public/sliders',$fileName);

        $slider = new Slider();
        $slider->caption = $request->caption;
        $slider->image = 'sliders/'.$fileName;
        $slider->status = $request->status;

        $slider->save();

        try {
            return back()->with('success','You have successfully upload slider.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error upload slider.');
        }


    }

    public function editSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.form_edit', compact('slider'));
    }

    public function desTroy($id)
    {
        $slider = Slider::find($id);
        Storage::delete('public/sliders/'.$slider->image);
        $slider->delete();

        try {
            return back()->with('success','You have successfully delete slider.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error delete slider.');
        }
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            'caption' => 'required',
            'status' => 'required',
        ]);
        $slider = Slider::find($id);
        if ($request->image) {
            $request->validate([
                'image' => 'file|max:10120',
            ]);
            $fileName = "sliders_" . time() . '.' . request()->image->getClientOriginalExtension();
            $pathName = $request->image->storeAs('public/sliders', $fileName);
            $slider->image = 'sliders/'.$fileName;
        }

        $slider->caption = $request->caption;
        $slider->status = $request->status;
        $slider->save();

        try {
            return back()->with('success','You have successfully update slider.');
        } catch (Exception $e) {
            return back()->with('Failed','You have error update slider.');
        }
    }
}
