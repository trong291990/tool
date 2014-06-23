<?php

class Project extends \Eloquent {

    protected $fillable = [];
    protected $table = 'projects';
    
    public function project_goals() {
        return $this->hasMany('ProjectGoal');
    }
    public function sprints(){
        return $this->hasMany('Sprint');
    }
    public function members(){
        return $this->belongsToMany('Member');
    }
    public function clients(){
        return $this->belongsToMany('Client');
    }
}