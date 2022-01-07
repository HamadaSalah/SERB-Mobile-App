<?php

namespace App\Http\Controllers\Api;

use App\CarTypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $allcars = CarTypes::where('parent_id', NULL)->get()->toArray();
        

        }
        catch(\Exception $e) {
            return response()->json(['data' => $e->getMessage()], 200);
        }
        return response()->json(['data' => $allcars], 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(CarTypes::findOrFail($id)) {
            $mycar = CarTypes::where('parent_id', $id)->get()->toArray();
            return response()->json(['data' => $mycar], 200);
        }
        else {
            return response()->json(['data'=> 'NO DATA AVIALBLE', 200]);
        }
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
    public function destroy($id)
    {
        //
    }
}
