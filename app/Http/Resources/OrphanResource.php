<?php

namespace App\Http\Resources;

use App\Models\Region;
use App\Models\State;
use Illuminate\Http\Resources\Json\JsonResource;

class OrphanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'guardian_name' => $this->guardian_name,
            'state_id' => $this->getState($this->state_id),
            'region_id' => $this->getRegion($this->region_id),
            'address' => $this->address,
            'mobile' => $this->mobile,
            'mobile2' => $this->mobile2,
        ];
    }

    public function getState($state_id)
    {
        return State::find($state_id)->name;
    }

    public function getRegion($region_id)
    {
        return Region::find($region_id)->name;

    }
}
