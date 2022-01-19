<?php

namespace App\Http\Controllers\Api\Driver;

use App\Chat;
use App\Driver;
use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Order;
use App\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Vonage\Client\Exception\Validation;

class OffersController extends Controller
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
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'user_id' => 'required',
            'driver_id' => 'required',
            'salary' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            try {
                $offer = Offer::create([
                    'order_id' =>$request->order_id,
                    'user_id' =>$request->user_id,
                    'driver_id' =>$request->driver_id,
                    'salary' => $request->salary,
                    'status' => 'pending'
                ]);
                return response()->json(['data' => $offer]);

            }
            catch(Exception $e) {
                return response()->json($e->getMessage());
            }
        }

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
        try {
            $offers = Offer::where('order_id', $id)
            ->join('orders', 'offers.order_id', '=', 'offers.id')
            ->join('drivers', 'offers.driver_id', '=', 'drivers.id')->get();
            return response()->json(['data' => $offers]);
        }
        catch(Exception $e) {
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
    public function AcceptOffer($id) {
        try {
            $offer = Offer::findOrFail($id);
            $offer->update(['status' => 'accepted']);    

            ///////
            try {
                $SERVER_API_KEY = 'AAAAqF4LZyc:APA91bE2U5uKDHqhbigz5TF_t0RSoIYyHJPmogU07MoyLWdjQlGBcFKFGirIDm7a-98m2454vQ2zUXhS6sxUpncgbKRHeJKg4tKy0PNgHxjJntTzHOMLlgFNMdkypobfVhstJHFHN_Ez';

                $token_1 = Driver::findOrFail($offer->driver_id);
                $token_1  = $token_1->fcm_token;
                $data = [
            
                    "registration_ids" => [$token_1],
            
                    "notification" => [
            
                        "title" => 'Welcome',
            
                        "body" => 'you Accepted To project on Serb',
            
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



            ///
            return response()->json(['data' => $offer]);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function openChatWithDriver(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'driver_id' => 'required',
            'order_id' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            try {
                $room = Room::create([
                    'order_id' =>$request->order_id,
                    'user_id' =>$request->user_id,
                    'driver_id' =>$request->driver_id,
                ]);
                return response()->json(['data' => $room]);

            }
            catch(Exception $e) {
                return response()->json($e->getMessage());
            }
        }

    }
    public function getAllChatRooms($id) {
        try {
            $rooms = Room::where('rooms.user_id', $id)
            ->join('orders', 'rooms.order_id', '=', 'orders.id')
            ->join('drivers', 'rooms.driver_id', '=', 'drivers.id')
           ->get();
            return response()->json(['data' => $rooms]);

        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function SendMessage(Request $request) {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required',
            'user_id' => 'required',
            'driver_id' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            try {
                $room = Chat::create([
                    'room_id' =>$request->room_id,
                    'user_id' =>$request->user_id,
                    'driver_id' =>$request->driver_id,
                    'message' =>$request->message,
                ]);
                broadcast(new SendMessage($room->message, $room->driver_id));
                return response()->json(['data' => $room]);

            }
            catch(Exception $e) {
                return response()->json($e->getMessage());
            }
        }

    }
    public function ChangeStatus($id, Request $request) {
            try {
                $order = Order::findOrFail($id);
                // ordered
                // pending
                // cancel
                // done
                $order->status = $request->status;
                $order->save();
                return response()->json(['data' => $order]);

            }
            catch(Exception $e) {
                return response()->json($e->getMessage());
            }

    }
    public function getAllMessages($id) {
        try {
            $chats = Chat::where('room_id', $id)->latest()->get()->toArray();
            return response()->json(['data' => $chats]);

        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
}
}
