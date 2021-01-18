<?php
/**
 * Created by PhpStorm.
 * User: chengyan
 * Date: 2021/1/18
 * Time: 10:55
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request )
    {
        $validator = $this->_validate($request,['card_no'=> 'required|string|min:10'],['card_no.required' => '卡号不能为空']);
        if ($validator === true){
            $user = DB::connection()->selectOne('SELECT a.*,b.f_CertificateID,b.f_CertificateType FROM [t_b_Consumer] a LEFT JOIN [t_b_Consumer_Other] b ON a.f_ConsumerID = b.f_ConsumerID where f_CardNO = '.$request->get('card_no'));
            return $this->response(0,'success',$user);
        }else{
            return $this->response(-1,$validator);
        }
        
    }
    
}