<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobdetails extends Model
{
    public function category(){
        return $this->hasOne(Category::class);
    }
    public function cv(){
        return $this->belongsToMany(ManageCv::class, 'job_c_v_s');
    }
}
