<?php
class Story extends \Eloquent {
    protected $table = 'stories';
    public function project(){
        return $this->belongsTo('Project');
    }
    public function tasks(){
        return $this->hasMany('Task');
    }
}