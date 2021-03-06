<?php

namespace App\Http\Controllers\Api\Driver;

use App\Driver;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api_driver', ['except' => ['login', 'register', 'VerficationCode', 'resetPassword', 'SendCodeReset', 'me', 'EditProfile']]);
    // }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            if (! $token = auth()->guard('api_driver')->attempt(['email' => request()->email, 'password' => request()->password])) {
                return response()->json(['errorMessage' => 'Unauthorized'], 200);
            }
        }
        else {
            if (! $token = auth()->guard('api_driver')->attempt(['phone' => request()->email, 'password' => request()->password])) {
                return response()->json(['errorMessage' => 'Unauthorized'], 200);
            }    
        }
        $user =  auth()->guard('api_driver')->user();
        if($request->fcm_token) {
            $user->fcm_token = $request->fcm_token;
        }
        $user->save();
        return response()->json(['data' => $user, 'token' => $token]);
        // return $this->respondWithToken($token);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'phone' => 'required|unique:drivers',
            'email' => 'required|unique:drivers',
            'password' => 'required',
            'country' => 'required',
            'city' => 'required',
            'fcm_token' => 'required',
            'type' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 200);
        }
        else {
            $request_data = $request->except(['token']);
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension();
                $filename = 'photo'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['photo'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }
            else {
                $request_data['photo'] = NULL;
            }
            $request_data['password'] = bcrypt($request_data['password']);
                $driver = Driver::create($request_data);
                $myuser = Driver::findOrFail($driver->id);
                return response()->json([
                    'message' => 'User successfully registered and code sent',
                    'user' => $myuser
                ], 200);
    
        }
    }
    public function EditProfile(Request $request, $id) {
        $driver = Driver::findOrFail($id);
        $request_data = $request->except(['token']);
        $driver->update($request_data);
        return response()->json(['data' => $driver]);
    }
    public function resetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 200);
        }
        else {
            $driver = Driver::findOrFail($request->id);
                $driver->update(['password' => bcrypt($request->password)]);
                return response()->json([
                    'message' => 'Password Updated Successfully',
                    'driver' => $driver
                ], 200);

        }
    }
    public function Driverprofile($id) {
        try {
            $driver = Driver::findOrFail($id);
            return response()->json(['data' => $driver], 200);

        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }

    }

}
