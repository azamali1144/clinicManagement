<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'qualification', 'duty_timings', 'responsibilities'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the user that owns the assistant.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
