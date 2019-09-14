<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        public function verifyUser()
    {
      return $this->hasOne('App\verifyUser');
    }
     public function userProfilePic()
    {
      return $this->hasOne('App\userProfilePic');
    }

    public function credit()
    {
      return $this->hasOne('App\credit');
    }
    
    public function userBasic()
    {
      return $this->hasOne('App\userBasic');
    }

    public function userDetails()
    {
      return $this->hasOne('App\userDetails');
    }

    public function userServiceRelation()
    {
      return $this->hasMany('App\userServiceRelation');
    }
    public function userWork()
    {
      return $this->hasMany('App\userWork');
    }
    public function userEducation()
    {
      return $this->hasMany('App\userEducation');
    }

    public function userProfessionalDesignation()
    {
      return $this->hasMany('App\userProfessionalDesignation');
    }

    public function userFinancialExam()
    {
      return $this->hasMany('App\userFinancialExam');
    }

     public function role()
    {
        return $this->belongsTo('App\role');
    }

     public function badge()
    {
        return $this->belongsTo('App\badge');
    }
    public function quotationRequest()
    {
      return $this->hasMany('App\quotationRequest');
    }




}
