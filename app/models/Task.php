<?php
class Task extends \Eloquent {
    protected $table = 'tasks';
    public function story(){
        return $this->belongsTo('Story');
    }
    public function user(){
        return $this->hasOne('User','assigned_to');
    }
}
