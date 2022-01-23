<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit = null)
    {
        if($limit != NULL) {
            try{
                $orders = Order::with('users')->latest()->limit($limit)->get();
                return response()->json(['data' =>$orders]);
                }
                catch(\Exception $e) {
                    return response()->json(['data' => $e->getMessage()]);
                }
            }
                
        else {
            try{
                $orders = Order::with('users')->latest()->get();
                return response()->json(['data' =>$orders]);
                }
                catch(\Exception $e) {
                    return response()->json(['data' => $e->getMessage()]);
                }

        }
            
    
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
        try{
            $order = Order::findOrFail($id)->toArray();
            return response()->json(['data' => $order], 200);
        }
        catch(\Exception $e) {
            return response()->json(['data' => $e->getMessage()], 200);
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
