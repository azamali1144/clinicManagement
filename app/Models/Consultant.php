<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'qualification', 'specialization', 'hospital', 'experience'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the user that owns the consultant.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    /**
     * Get the appointments for the user.
     */
    public function appointment()
    {
        return $this->hasMany('App\Models\Appointment');
    }
}
