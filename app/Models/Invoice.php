<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'appointment_id', 'usg', 'drip', 'lab', 'other', 'remarks'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the appointment that owns the invoices.
     */
    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
}
