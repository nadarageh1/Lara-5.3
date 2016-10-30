<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public static function rules(){
     return 
         [
            'email' =>'required|email|min:3|max:16',
            'password' =>'required|min:8|max:16'
         ];   
    }
    public static function updateUser(){
         return 
         [
            'name'     => 'required|min:3|max:16',
            'email'    =>'required|email|min:3|max:16',
            'password' =>'required|min:8|max:16'
         ]; 
    }

   
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
   

}
