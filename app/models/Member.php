<?php
class Member extends User {
    protected  $table = 'members';
    public function user(){
        return $this->hasOne('User');
    }
    public function projects(){
       return $this->belongsToMany('Project');
    }
    public function tasks(){
        return $this->hasMany('Task','assigned_to');
    }
}

