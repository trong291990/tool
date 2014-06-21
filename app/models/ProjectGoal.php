<?php

class ProjectGoal extends \Eloquent {

    protected $fillable = [];
    
    protected $table = 'project_goals';
    
    public function project() {
        return $this->belongsTo('Project');
    }

}