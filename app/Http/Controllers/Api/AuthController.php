<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MySendMail;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'VerficationCode', 'resetPassword', 'SendCodeReset', 'me', 'EditProfile']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            if (! $token = auth()->attempt(['email' => request()->email, 'password' => request()->password])) {
                return response()->json(['errorMessage' => 'Unauthorized'], 200);
            }
        }
        else {
            if (! $token = auth()->attempt(['phone' => request()->email, 'password' => request()->password])) {
                return response()->json(['errorMessage' => 'Unauthorized'], 200);
            }    
        }
        $user =  auth()->user();
        $user->fcm_token = $request->fcm_token;
        $user->save();
        return response()->json(['data' => auth()->user(), 'token' => $token], 200);
        // return $this->respondWithToken($token);
    }


    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 200);
        }
        else {
            $code = random_int(100000, 999999);
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt($request->password),
                    'verification_code' => $code,
                    'fcm_token' => $request->fcm_token
                ]);
                $myuser = User::findOrFail($user->id);
                return response()->json([
                    'message' => 'User successfully registered and code sent',
                    'user' => $myuser
                ], 200);
    
            
                // try {
  
                //     $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
                //     $client = new \Nexmo\Client($basic);
                        
                //     $message = $client->message()->send([
                //         'to' => $request->phone,
                //         'from' => 'Vonage APIs',
                //         'text' => $code
                //     ]);
            
                      
                // } catch (Exception $e) {
                // }

    
        }
    }
    public function SendCodeReset(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 200);
        }
        else {
            if(filter_var($request->phone, FILTER_VALIDATE_EMAIL)) {
                if($user = User::where('email', $request->phone)->first()) {
                    $code = random_int(100000, 999999);
                    $user->update(['verification_code' => $code]);
                    Mail::to($request->phone)->send(new MySendMail($code));
                } else {
                    return response()->json([
                        'message' => 'No User With This Number'
                    ], 404);
    
                }
            }
            else {
                if($user = User::where('phone', $request->phone)->first()) {
                    $code = random_int(100000, 999999);
                    $user->update(['verification_code' => $code]);
                    try {
  
                        $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
                        $client = new \Nexmo\Client($basic);
                            
                        $message = $client->message()->send([
                            'to' => $request->phone,
                            'from' => 'SERB Application',
                            'text' => 'Your Verification Code is '.$code
                        ]);
                
                          
                    } catch (Exception $e) {
                    }

                } else {
                    return response()->json([
                        'message' => 'No User With This Number'
                    ], 404);
    
                }

            }
            if($user = User::where('phone', $request->phone)->first()) {
                $code = random_int(100000, 999999);
                $user->update(['verification_code' => $code]);
                if(filter_var($request->phone, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($request->phone)->send(new MySendMail($code));
                }
                else {
                    try {
  
                        $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
                        $client = new \Nexmo\Client($basic);
                            
                        $message = $client->message()->send([
                            'to' => $request->phone,
                            'from' => 'SERB Application',
                            'text' => 'Your Verification Code is '.$code
                        ]);
                
                          
                    } catch (Exception $e) {
                    }
    
                }
                return response()->json([
                    'message' => 'Verfication code Sent Successfully',
                    'user' => $user
                ], 200);
            }
            else {
                return response()->json([
                    'message' => 'No User With This Number'
                ], 200);

            }
        }
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
            $user = User::findOrFail($request->id);
                $user->update(['password' => bcrypt($request->password)]);
                return response()->json([
                    'message' => 'Password Updated Successfully',
                    'user' => $user
                ], 200);

        }
    }

    public function VerficationCode(Request $request) {
        $validator = Validator::make($request->all(), [
            'ver_code' => 'required',
            'id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 200);
        }
        else {
        $user = User::findOrFail($request->id);
        if($request->ver_code == $user->verification_code) {
            $user->update(['phone_verified_at' => now()]);
            $token = auth()->login($user);
            return response()->json([
                'message' => 'User successfully Activated',
                'user' => $user,
                'token' => $token
            ], 200);
        }
        else {
            return response()->json(['data' =>['Message' => 'Verfication Code is Fault']], 200);
        }
    }



    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function EditProfile(Request $request, $id) {
        $user = User::findOrFail($id);
        $request_data = $request->except(['token']);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'user'.'_'.time().'.'.$ext;
            $file->storeAs('public/users', $filename);
            $request_data['img'] = 'http://serb.devhamadasalah.com/storage/users/'.$filename;
        }

        $user->update($request_data);
        return response()->json(['data' => $user]);
    }
}
