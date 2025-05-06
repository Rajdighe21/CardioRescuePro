<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function assessment()
    {
        return $this->hasOne(Assessment::class, 'patient_id');
    }
}
