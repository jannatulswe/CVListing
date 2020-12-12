<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageCv extends Model
{
    protected $table = 'create_c_v_s';
    public function jobs(){
        return $this->belongsToMany(Jobdetails::class, 'job_c_v_s');
    }
}
