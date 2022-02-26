<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class PatientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $imageORpdf='';
        if($this->type==='image'){
            $imageORpdf=Request::root().'/patients/img/'.$this->result;
        }else{
            $imageORpdf=Request::root().'/patients/pdf/'.$this->result;
        }

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'age'=>$this->age,
            'phone'=>$this->phone,
            'gender'=>$this->gender,
            'result'=>$imageORpdf,
            'type'=>$this->type,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
