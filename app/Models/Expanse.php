<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expanse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'amount', 'details', 'user_id', 'date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the user that owns the patient.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
