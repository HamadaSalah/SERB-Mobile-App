<?php

namespace App\Http\Controllers;

use App\WorkMethod;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class WorkmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Work.index', [
            'title' => 'طريقة العمل',
            'works' => WorkMethod::all()
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
            'quest' => 'required',
            'ans' => 'required'
        ],[],[
            'quest' => 'طريقة العمل',
            'ans' => 'الاجابة'

        ]);
        $request_all = $request->only(['quest', 'ans']);
        WorkMethod::create($request_all);
        return redirect()->back()->with('success', 'تم الاضافة بمجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $work = WorkMethod::findOrFail($request->id);
        $work->delete();
        return redirect()->back()->with('success', 'تم الحذف  بنجاح');
    }
}
