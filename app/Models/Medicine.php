<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'company', 'formula', 'appearance',
        'colour', 'quantity', 'price', 'delivered_by', 'taste', 'expiry_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the prescription for the appointment.
     */
    public function prescription()
    {
        return $this->hasMany('App\Models\Prescription');
    }
}
