<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get the patient record associated with the user.
     */
    public function patient()
    {
        return $this->hasOne('\App\Models\Patient');
    }


    /**
     * Get the consultant record associated with the user.
     */
    public function consultant()
    {
        return $this->hasOne('\App\Models\Consultant');
    }


    /**
     * Get the assistant record associated with the user.
     */
    public function assistant()
    {
        return $this->hasOne('\App\Models\Assistant');
    }

    /**
     * Get the expanse record associated with the user.
     */
    public function expanse()
    {
        return $this->hasMany('\App\Models\Expanse');
    }

    /**
     * Get the setting record associated with the user.
     */
    public function setting()
    {
        return $this->hasOne('\App\Models\Setting');
    }
}
