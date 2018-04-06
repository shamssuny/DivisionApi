<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function upazilas(){
        return $this->hasMany(Upazila::class);
    }
}
