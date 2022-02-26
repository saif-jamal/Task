<?php


namespace App\Http\Controllers\Api;


trait ApiResponseData
{
   //show template form of api
    public function tamplateApidata($message=null,$status=null,$data=null){
        return response([
            'message'=>$message,
            'status'=>$status,
            'data'=>$data
        ]);
    }
}
