<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $sliders = Slider::select();
            return datatables()->of($sliders)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return $this->getActionColumn($data);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:1024'
        ]);

        $slider = Slider::create(array_merge($request->all(), ['image' => '/storage/' . $request->file('image')->storePublicly('slider')]));

        return redirect()->route('admin.slider.index')->with('success', 'Success Create Slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.create-edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        if ($request->image) {
            $slider->update(['image' => '/storage/' . $request->file('image')->storePublicly('slider')]);
        }

        return redirect()->route('admin.slider.index')->with('success', 'Successfully Updated Slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();
            return redirect()->route('admin.slider.index')->with('success', 'Successfully Deleted Slider');
        } catch (\Throwable $th) {
            return redirect()->route('admin.slider.index')->with('error', 'Failed to Delete Slider');
        }
    }

    public function getActionColumn($data)
    {
        $editBtn = route('admin.slider.edit', $data->id);
        $deleteBtn = route('admin.slider.destroy', $data->id);
        $ident = Str::random();

        return
        '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>'
        . '<button type="button" onclick="delete_data(\'form'.$ident .'\')" class="mx-1 my-1 btn btn-sm btn-outline-danger">Delete</button>'
        .'<form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
        </form>';
    }
}
