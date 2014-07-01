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
    public static function boot()
    {
        parent::boot();
        static::creating(function($page)
        {
           if(isset($page->joined_date) && $page->joined_date){
               $page->joined_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->joined_date)->format('Y-m-d');
           }
        });
        static::updating(function($page)
        {
           if(isset($page->joined_date) && $page->joined_date){
               $page->joined_date = LocalizedCarbon::createFromFormat('m/d/Y',$page->joined_date)->format('Y-m-d');
           }
        });
        static::created(function($page)
        {
           
        });
        static::deleted(function($obj){
            $user = User::find($obj->user_id);
            $user->delete();
        });
    }
}

