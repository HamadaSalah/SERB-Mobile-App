<?php

namespace App\Http\Controllers\Api;

use App\Driver;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\StoreImageTrait;
use Exception;

class OrdersController extends Controller
{
    use StoreImageTrait;
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
            'type' => 'required',
            'init_price' => 'required',
            'start_loc' => 'required',
            'end_loc' => 'required',
            'user_id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            try {
                $SERVER_API_KEY = 'AAAAqF4LZyc:APA91bE2U5uKDHqhbigz5TF_t0RSoIYyHJPmogU07MoyLWdjQlGBcFKFGirIDm7a-98m2454vQ2zUXhS6sxUpncgbKRHeJKg4tKy0PNgHxjJntTzHOMLlgFNMdkypobfVhstJHFHN_EzAAAAqF4LZyc:APA91bE2U5uKDHqhbigz5TF_t0RSoIYyHJPmogU07MoyLWdjQlGBcFKFGirIDm7a-98m2454vQ2zUXhS6sxUpncgbKRHeJKg4tKy0PNgHxjJntTzHOMLlgFNMdkypobfVhstJHFHN_Ez';

                $token_1 = Driver::pluck('fcm_token')->toArray();
                $data = [
            
                    "registration_ids" => $token_1,
            
                    "notification" => [
            
                        "title" => 'Welcome',
            
                        "body" => 'New Order Added to Serb',
            
                        "sound"=> "default" // required for sound on ios
            
                    ],
            
                ];
            
                $dataString = json_encode($data);
            
                $headers = [
            
                    'Authorization: key=' . $SERVER_API_KEY,
            
                    'Content-Type: application/json',
            
                ];
            
                $ch = curl_init();
            
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            
                curl_setopt($ch, CURLOPT_POST, true);
            
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            
                $response = curl_exec($ch);
            
            }
            catch(Exception $e) {

            }
            $request_data = $request->except(['token']);
        if ($this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'orders' , $myroute = 'http://serb.devhamadasalah.com/storage/orders/') != null)
             $request_data['img'] = $this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'orders', $myroute = 'http://serb.devhamadasalah.com/storage/orders/');
        // if ($request->hasFile('img')) {
        //     $file = $request->file('img');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = 'product_image'.'_'.time().'.'.$ext;
        //     $file->storeAs('public/orders', $filename);
        //     $request_data['img'] = 'http://serb.devhamadasalah.com/storage/orders/'.$filename;
        // }
        
        if ($request->hasFile('record')) {
            $file = $request->file('record');
            $ext = $file->getClientOriginalExtension();
            $filename = 'product_image'.'_'.time().'.'.$ext;
            $file->storeAs('public/records', $filename);
            $request_data['record'] = 'http://serb.devhamadasalah.com/storage/records/'.$filename;
        }

            $order = Order::create($request_data);
            return response()->json(['data' => $order]);
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
        $orders = Order::where('user_id', $id)->get()->toArray();
        return response()->json(['data' => $orders], 200);
    }
    public function showorder($id) {
        try {
            $order = Order::findOrFail($id);
            return response()->json(['data'=> $order]);
        }
        catch(\Exception $e) {
            return response()->json($e->getMessage());
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
