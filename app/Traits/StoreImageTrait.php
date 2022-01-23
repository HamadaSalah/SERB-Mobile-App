<?php

namespace App\Traits;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
trait StoreImageTrait {
    public function verifyAndStoreImage( Request $request, $fieldname = 'img', $directory = 'unknown', $myroute = 'http://serb.devhamadasalah.com/storage' ) {
        $mydata = [];
        if( $request->hasFile( $fieldname ) ) {
            
            $files = $request->file($fieldname);
            foreach($files as $file)
            {
                    $ext = $file->getClientOriginalExtension();
                    $filename = $directory.'_'.time().Str::random(8).'.'.$ext;
                    $file->storeAs('public/'.$directory, $filename);
                    $col = $myroute.''.$filename;  
                    array_push($mydata, $col);

                }
                 return $mydata;
        }

       

    }

}
