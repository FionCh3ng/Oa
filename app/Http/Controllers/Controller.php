<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function _validate($request,$rules,$message)
    {
        try{
            $this->validate($request,$rules,$message);
            return true;
        }catch (ValidationException $exception){
            return $exception->getMessage();
//            return false;
        }
    }
    
    public function response($ret,$error = 'success',$data = [])
    {
        return response()->json(['code' => $ret,'error' => $error, 'data' => $data]);
    }
}
