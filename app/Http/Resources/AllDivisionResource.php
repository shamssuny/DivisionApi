<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllDivisionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [

                'name' => $this->name,
                'bn_name' => $this->bn_name,
                'districts' =>  DistrictResource::collection($this->districts)

        ];
    }
}
