<?php

class Project extends BaseModel {

    protected $fillable = [];
    protected $table = 'projects';
    protected $rulesValidation = array(
        'name'=>'required|max:255',
        'description'=>'required',
        'plan_start_date'=>'date_format:m/d/Y',
        'plan_end_date'=>'date_format:m/d/Y'
    );
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
    public static function boot()
    {
        parent::boot();
        static::creating(function($page)
        {
           if(isset($page->plan_start_date) && $page->plan_start_date){
               $page->plan_start_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->plan_start_date)->format('Y-m-d');
           }
           if(isset($page->plan_end_date) && $page->plan_end_date){
               $page->plan_end_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->plan_end_date)->format('Y-m-d');
           }
           if(isset($page->actual_start_date) && $page->actual_start_date){
               $page->actual_start_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->actual_start_date)->format('Y-m-d');
           }
           if(isset($page->actual_end_date) && $page->actual_end_date){
               $page->actual_end_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->actual_end_date)->format('Y-m-d');
           }
        });
        static::updating(function($page)
        {
           if(isset($page->plan_start_date) && $page->plan_start_date){
               $page->plan_start_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->plan_start_date)->format('Y-m-d');
           }
           if(isset($page->plan_end_date) && $page->plan_end_date){
               $page->plan_end_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->plan_end_date)->format('Y-m-d');
           }
           if(isset($page->actual_start_date) && $page->actual_start_date){
               $page->actual_start_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->actual_start_date)->format('Y-m-d');
           }
           if(isset($page->actual_end_date) && $page->actual_end_date){
               $page->actual_end_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->actual_end_date)->format('Y-m-d');
           }
        });
        static::created(function($page)
        {
           
        });
        static::deleted(function($obj){
         
        });
    }
}