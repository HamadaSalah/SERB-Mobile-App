<?php

namespace App\Traits;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
trait StoreImageTrait {

    public function verifyAndStoreImage( Request $request, $fieldname = 'img', $directory = 'unknown', $myroute = 'http://serb.devhamadasalah.com/storage' ) {

        if( $request->hasFile( $fieldname ) ) {
            if(is_array($request->file($fieldname))) {
                foreach($request->file($fieldname) as $file)
                {
                    $ext = $file->getClientOriginalExtension();
                    $filename = $directory.'_'.time().Str::random(8).'.'.$ext;
                    $file->storeAs('public/'.$directory, $filename);
                    $mydata[] = $myroute.''.$filename;  
                }
            }
            else {
                    $ext = $request->file($fieldname)->getClientOriginalExtension();
                    $filename = $directory.'_'.time().Str::random(8).'.'.$ext;
                    $request->file($fieldname)->storeAs('public/'.$directory, $filename);
                    $mydata[] = $myroute.''.$filename; 

            }
                 return $mydata;
        }

       

    }

}
