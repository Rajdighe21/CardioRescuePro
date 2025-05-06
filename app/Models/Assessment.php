<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{

    protected $guarded = [];
    protected $connection = 'tenant';


    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')
                    ->setConnection($this->connection);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')
                    ->setConnection($this->connection);
    }


}
