<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'newsHeadline'=>$this->newsHeadline,
            'content'=>$this->content,
            'image'=>Request::root().'/news/img/'.$this->image,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
