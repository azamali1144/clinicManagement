<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appointment_id', 'medicine_id', 'unit', 'type', 'dosage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the appointment that owns the prescription.
     */
    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment');
    }


    /**
     * Get the medicine that owns the prescription.
     */
    public function medicine()
    {
        return $this->belongsTo('App\Models\Medicine');
    }
}
