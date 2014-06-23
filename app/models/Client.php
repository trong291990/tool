<?php
class Client extends User {
    protected  $table = 'clients';
    public function user(){
        return $this->hasOne('User');
    }
    public function projects(){
        return $this->belongsToMany('Project');
    }
}

