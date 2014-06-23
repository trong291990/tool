<?php

class Project extends \Eloquent {

    protected $fillable = [];
    protected $table = 'projects';
    
    public function project_goals() {
        return $this->hasMany('ProjectGoal');
    }

}