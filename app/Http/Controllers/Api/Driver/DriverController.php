<?php

namespace App\Http\Controllers\Api\Driver;

use App\Car;
use App\Driver;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\StoreImageTrait;
class DriverController extends Controller
{
    use StoreImageTrait;
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
    public function UploadDocs($id, Request $request) {
        try {
            $driver = Driver::findOrFail($id);
            $request_data = $request->except(['token']);
            if ($request->hasFile('NationID')) {
                $file = $request->file('NationID');
                $ext = $file->getClientOriginalExtension();
                $filename = 'driver'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['NationID'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }

            if ($request->hasFile('D_licence')) {
                $file = $request->file('D_licence');
                $ext = $file->getClientOriginalExtension();
                $filename = 'driver'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['D_licence'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }


            if ($request->hasFile('com_reg')) {
                $file = $request->file('com_reg');
                $ext = $file->getClientOriginalExtension();
                $filename = 'driver'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['com_reg'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }


            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension();
                $filename = 'driver'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['photo'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }
            $driver->update($request_data);
            return response()->json(['data' => $driver], 200);

        }
        catch(Exception $e) {
            return response()->json(['data' => $e->getMessage()], 200);
        }
    }
    public function addCarDriver($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_no' => 'required',
            'country' => 'required',
            'city' => 'required',
            'img_front' => 'required',
            'img_back' => 'required',
            'img_left' => 'required',
            'img_right' => 'required',
            'form' => 'required',
            'policy' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            $request_data = $request->except('_token');
            if ($request->hasFile('img_front')) {
                $file = $request->file('img_front');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_front'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_front'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('img_back')) {
                $file = $request->file('img_back');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_back'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_back'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('img_left')) {
                $file = $request->file('img_left');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_left'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_left'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('img_right')) {
                $file = $request->file('img_right');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_right'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_right'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('form')) {
                $file = $request->file('form');
                $ext = $file->getClientOriginalExtension();
                $filename = 'form'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['form'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('policy')) {
                $file = $request->file('policy');
                $ext = $file->getClientOriginalExtension();
                $filename = 'policy'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['policy'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }

   
            $car = Car::create([
                'driver_id' => $id,
                'name' => $request_data['name'],
                'type' => $request_data['type'],
                'model' => $request_data['model'],
                'year' => $request_data['year'],
                'car_no' => $request_data['car_no'],
                'country' => $request_data['country'],
                'city' => $request_data['city'],
                'img_front' => $request_data['img_front'],
                'img_back' => $request_data['img_back'],
                'img_left' => $request_data['img_left'],
                'img_right' => $request_data['img_right'],
                'form' => $request_data['form'],
                'policy' => $request_data['policy'],
            ]);
            return response()->json(['data' => $car]);
        }
                
    }
    public function addCarCompany($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_no' => 'required',
            'country' => 'required',
            'city' => 'required',
            'img_front' => 'required',
            'img_back' => 'required',
            'img_left' => 'required',
            'img_right' => 'required',
            'form' => 'required',
            'policy' => 'required',
            'd_name' => 'required',
            'd_email' => 'required',
            'd_phone' => 'required',
            'd_nation_id' => 'required',
            'd_licence' => 'required',
            'd_photo' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['Validation Erorrs' => $validator->messages()], 403);
        }
        else {
            $request_data = $request->except('_token');
            if ($request->hasFile('img_front')) {
                $file = $request->file('img_front');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_front'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_front'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('img_back')) {
                $file = $request->file('img_back');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_back'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_back'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('img_left')) {
                $file = $request->file('img_left');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_left'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_left'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('img_right')) {
                $file = $request->file('img_right');
                $ext = $file->getClientOriginalExtension();
                $filename = 'img_right'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['img_right'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('form')) {
                $file = $request->file('form');
                $ext = $file->getClientOriginalExtension();
                $filename = 'form'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['form'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }
            if ($request->hasFile('policy')) {
                $file = $request->file('policy');
                $ext = $file->getClientOriginalExtension();
                $filename = 'policy'.'_'.time().'.'.$ext;
                $file->storeAs('public/cars', $filename);
                $request_data['policy'] = 'http://serb.devhamadasalah.com/storage/cars/'.$filename;
            }

            if ($request->hasFile('d_nation_id')) {
                $file = $request->file('d_nation_id');
                $ext = $file->getClientOriginalExtension();
                $filename = 'd_nation_id'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['d_nation_id'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }

            if ($request->hasFile('d_licence')) {
                $file = $request->file('d_licence');
                $ext = $file->getClientOriginalExtension();
                $filename = 'd_licence'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['d_licence'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }

            if ($request->hasFile('d_photo')) {
                $file = $request->file('d_photo');
                $ext = $file->getClientOriginalExtension();
                $filename = 'd_photo'.'_'.time().'.'.$ext;
                $file->storeAs('public/drivers', $filename);
                $request_data['d_photo'] = 'http://serb.devhamadasalah.com/storage/drivers/'.$filename;
            }
            $driver = Driver::create([
                'full_name' =>  $request_data['d_name'],
                'email' =>  $request_data['d_email'],
                'phone' =>  $request_data['d_phone'],
                'password' =>  bcrypt('12332100'),
                'type' =>  'company_driver',
                'NationID' =>  $request_data['d_nation_id'],
                'D_licence' =>  $request_data['d_licence'],
                'photo' =>  $request_data['d_photo'],
                'company_id' => $id, 

            ]);

            $car = Car::create([
                'driver_id' => $id,
                'name' => $request_data['name'],
                'type' => $request_data['type'],
                'model' => $request_data['model'],
                'year' => $request_data['year'],
                'car_no' => $request_data['car_no'],
                'country' => $request_data['country'],
                'city' => $request_data['city'],
                'img_front' => $request_data['img_front'],
                'img_back' => $request_data['img_back'],
                'img_left' => $request_data['img_left'],
                'img_right' => $request_data['img_right'],
                'form' => $request_data['form'],
                'policy' => $request_data['policy'],
                'driver_company_id' => $driver->id
            ]);
            return response()->json(['data' => [$car, $driver]]);
        }
    }
    public function allCars($id) {
        try {
            $cars = Car::where('driver_id', $id)->get(['id', 'name', 'img_front', 'driver_company_id', 'model', 'car_no' ])->toArray();
            $allcars = [];
           foreach ($cars as $car) {
                $driver = Driver::findOrFail($car['driver_company_id']);
                $car = array_merge($car, [
                    'driver_name' => $driver->full_name,
                    'driver_img' => $driver->photo,
                ]);
                array_push($allcars, $car);
            }
            return response()->json(['data' => $allcars], 200);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
