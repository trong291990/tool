<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * @author User
 */
class BaseModel extends Eloquent {
    protected $rulesValidation = array();
    protected $messagesValidation = array();
    public function isFailValidation($fromInput=false){
        $rules = $this->rulesValidation;
        $messages = $this->messagesValidation;
        if($fromInput){
            $input = Input::all();
        }else{
           $input = array();
           foreach ($rules  as $key => $rule){
               if($this->$key){
                   $input[$key] = $this->$key;
               }
           } 
        }
        foreach ($rules  as $key => $rule){
            if(strpos($rule,':id')){
                $id = isset($input['id']) ? $input['id'] : ($this->id ? $this->id : 0);
                $rules[$key] = str_replace(':id',$id, $rule);
            }
        }
        //print_r($rules);die();
        $validator = Validator::make($input,$rules,$messages);
    	if(!$validator->fails()){
            return false;
    	}else{
            return $validator;
    	}
    }
    
}
