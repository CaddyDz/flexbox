<?php

namespace Fresh;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        'first_name', 'remember_token',
    ];

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
        ;
    }

    public function getFirstNameOrUsername()
    {
        if (!$this->first_name) {
            return $this->username;
        }
        return $this->first_name;
    }
}
