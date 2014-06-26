<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    public function member(){
        return $this->hasOne('Member');
    }
    protected $rulesValidation = array(
        'name'=>'required|min:3|max:25',
        'email'=>"required|email|unique:users,email,:id",
        'gender'=>'required',
        'birthday'=>'date_format:m/d/Y',
        'avatar'=>'max:225',
        'street_address'=>'max:225',
        'city'=>'max:255',
        'country'=>'max:255',
        'experience'=>'max:1023'
    );




//    public function roles() {
//        return $this->belongsToMany('Role');
//    }
//
//    public function permissions() {
//        return $this->hasMany('Permission');
//    }
//
//    public function hasRole($key) {
//        foreach ($this->roles as $role) {
//            if ($role->name === $key) {
//                return true;
//            }
//        }
//        return false;
//    }

    public static function generalPassword($length=6){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    

    public static function boot()
    {
        parent::boot();
        static::creating(function($page)
        {
           if(isset($page->birthday) && $page->birthday){
               $page->birthday = LocalizedCarbon::createFromFormat('m/d/Y',$page->birthday)->format('Y-m-d');
           }
           if(isset($page->joined_at) && $page->joined_at){
               $page->joined_at = LocalizedCarbon::createFromFormat('m/d/Y',$page->joined_at)->format('Y-m-d');
           }
        });
        static::updating(function($page)
        {
            // do stuff
        });
        static::created(function($page)
        {
           
        });
    }
}
