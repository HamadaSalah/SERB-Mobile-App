<?php

namespace App\Http\Controllers;

use App\CarTypes;
use Illuminate\Http\Request;

class CarTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.CarTypes.index', [
            'title' => 'كل انواع الشاحنات',
            'cars' => CarTypes::where('parent_id',NULL)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'name' => 'required',
                'img' => 'required'
            ]);
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $ext = $file->getClientOriginalExtension();
                $filename = 'cartype_image'.'_'.time().'.'.$ext;
                $file->storeAs('public/images/cartypes', $filename);
            }
            $request_all = $request->only('name', 'parent_id', 'img');
            $request_all['img'] = 'http://serb.devhamadasalah.com/storage/images/cartypes/'.$filename;
            CarTypes::create($request_all);
        return redirect()->back()->with('success', 'تم اضافة الشاحنه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarTypes  $carTypes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.CarTypes.show', [
            'cars' => CarTypes::where('parent_id', $id)->get(),
            'id' =>$id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarTypes  $carTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(CarTypes $carTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarTypes  $carTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarTypes $carTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarTypes  $carTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = CarTypes::findOrFail($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'تم حذف الشاحنه بنجاح');
    }
}
