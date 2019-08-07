<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'patient_id', 'consultant_id', 'appointment_date', 'start_time', 'end_time', 'diagnosed_with'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the patient that owns the appointment.
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }


    /**
     * Get the consultant that owns the appointment.
     */
    public function consultant()
    {
        return $this->belongsTo('App\Models\Consultant');
    }


    /**
     * Get the invoice for the appointment.
     */
    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }


    /**
     * Get the prescription for the appointment.
     */
    public function prescription()
    {
        return $this->hasMany('App\Models\Prescription');
    }
}
