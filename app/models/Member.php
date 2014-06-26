<?php
class Member extends User {
    protected  $table = 'members';
    public function user(){
        return $this->belongsTo('User');
    }
    public function projects(){
       return $this->belongsToMany('Project');
    }
    public function tasks(){
        return $this->hasMany('Task','assigned_to');
    }
    protected $rulesValidation = array(
        'user_id'=>'integer',
        'joined_date'=>'date_format:m/d/Y'
    );
}

