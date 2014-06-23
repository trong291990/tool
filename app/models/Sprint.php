<?php

class Sprint extends \Eloquent {
    //put your code here
    protected $tables ='sprints';
    public function project(){
       return $this->belongsTo('Project');
    }
    public function stories(){
       return $this->hasMany('Story');
    }
}
