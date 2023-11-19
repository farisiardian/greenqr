<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'phone',
        'ic',
        'nationality',
        'dob',
        'gender',
        'profile_image',
        'background_image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        return $this->role == 'admin';
    }
    public function isUser() {
        return $this->role == 'normal';
    }

    public function isVendor() {
        return $this->role == 'vendor';
    }

    public function wallets() {
        return $this->hasMany('App\Models\Wallet');
    }

    public function address() {
        return $this->hasMany('App\Models\UserAddress');
    }

    public function banks() {
        return $this->hasMany('App\Models\UserBank');
    }

    public function notifications() {
        return $this->hasMany('App\Models\Notification');
    }


    public function cart(){

        return $this->hasMany(ShoppingCart::class,'user_id');
    }
	
	public function ratings(){
        return $this->hasMany(OrderRating::class,'user_id','id');
    }
	
	public function user_address(){
		return $this->hasMany(UserAddress::class,'user_id','id');
	}
}
