<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];
    //mutator function 
public function setPasswordAttribute($value){
    $this->attributes['password']=Hash::make($value);
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    // public function roles(){
    //     return $this->hasOne(Roles::class,'role_id');
    // }

    public function roles(){
        return $this->belongsTo(Roles::class,'role_id');
    }
}
