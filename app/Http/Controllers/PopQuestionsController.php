<?php

namespace App\Http\Controllers;

use App\PopQuest;
use Illuminate\Http\Request;

class PopQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Popular.index', [
            'title' => 'الاسئلة الشائعة',
            'works' => PopQuest::all()
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
            'quest' => 'السؤال',
            'ans' => 'الاجابة'

        ]);
        $request_all = $request->only(['quest', 'ans']);
        PopQuest::create($request_all);
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
        $work = PopQuest::findOrFail($request->id);
        $work->delete();
        return redirect()->back()->with('success', 'تم الحذف  بنجاح');
    }
}
