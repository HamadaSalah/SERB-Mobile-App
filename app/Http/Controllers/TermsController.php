<?php

namespace App\Http\Controllers;

use App\About;
use App\Terms;
use App\WorkMethod;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Terms.index', [
            'title' => 'الشروط والاحكام',
            'terms' => Terms::first()
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
        // $request->validate([
        //     'quest' => 'required',
        //     'ans' => 'required'
        // ],[],[
        //     'quest' => 'طريقة العمل',
        //     'ans' => 'الاجابة'

        // ]);
        // $request_all = $request->only(['quest', 'ans']);
        // WorkMethod::create($request_all);
        // return redirect()->back()->with('success', 'تم الاضافة بمجاح');
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
    public function edit($id, Request $request)
    {
        $terms = Terms::findOrFail($id);
        $terms->text = $request->text;
        $terms->update();
        return redirect()->back()->with('success', 'تم التعديل  بنجاح');
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
    public function about() {
        return view('Admin.About.index', [
            'about' => About::first(),
            'title' => 'عن سرب'
        ]);
    }
    public function saveAbout(Request $request) {
        $about = About::first();
        $about->update(['about' => $request->about]);
        return redirect()->route('admin.about')->with('success', 'تم التعديل بنجاح');
    }
}
