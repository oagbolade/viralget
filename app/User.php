<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserDetailsManagement;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 
    // ];

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function subscription() {
        return $this->belongsTo(Subscription::class, 'id', 'user_id');
    }

    public function details() {
        return $this->belongsTo(UserDetails::class, 'id', 'user_id');
    }
    
    public function managementDetails() {
        return $this->belongsTo(UserDetailsManagement::class, 'id', 'user_id');
    }

}
