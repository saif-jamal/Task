<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientsResource;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    use ApiResponseData;

    //show all data
    public function show(){
        $patients=PatientsResource::collection(Patients::all());
        return $this->tamplateApidata('all patients',200,$patients);
    }

    //show one patient by using his id
    public function showOne(Request $request){
        if($request->id){
            $id=(int)$request->id;
            $Patient=Patients::find($id);
            return $this->tamplateApidata('show one patient',200,new PatientsResource($Patient));
        }else{
            return $this->tamplateApidata('the id of Patient not receive from client view',404);
        }
    }
}
