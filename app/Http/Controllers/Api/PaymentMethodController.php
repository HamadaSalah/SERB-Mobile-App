<?php

namespace App\Http\Controllers\Api;

use App\About;
use App\BankAccount;
use App\ContactUs;
use App\Help;
use App\Http\Controllers\Controller;
use App\PopQuest;
use App\Terms;
use App\Wallet;
use App\WorkMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'number' => 'required',
            'ex_month' => 'required',
            'ex_year' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            $payment = BankAccount::create($request->all());
            return response()->json(['message' => 'Added Successfully'], 200);
        }
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
    public function destroy($id)
    {
        //
    }

    public function showBalance($id) {
        if (Wallet::where('user_id', $id)->first()) {
            $balance = Wallet::where('user_id', $id)->first();
            return response()->json(['data' => ['Balance' => $balance->amount ]]);
        } else {
            return response()->json(['data' => ['Balance' => 0 ]]);
        }
        
        
        
    }
    public function workMethod() {
        
        return response()->json(['data' => WorkMethod::all()]);
    }
    public function terms() {
        
        return response()->json(['data' => Terms::all()]);
    }
    public function popularQuest() {
        return response()->json(['data' => PopQuest::all()]);
    }
    public function AboutUs() {
        return response()->json(['data' => About::first()->get('about')]);
    }
    public function help(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            Help::create(['user_id'=>$id, 'message' => $request->message]);
            return response()->json(['message' => 'Message Sent Successfully'], 200);
        }

    }
    public function contactUs(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            ContactUs::create(['user_id'=>$id, 'message' => $request->message, 'type' => $request->type]);
            return response()->json(['message' => 'Message Sent Successfully'], 200);
        }

    }
}
