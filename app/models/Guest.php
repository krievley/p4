<?php

/* 
 * This model represents the guests table.
 */

class Guest extends Eloquent {
    /**
    * The following functions represent the relationships
    * of the User model to other models
    *
    * @var function
    */
    
    public function parties() {
            return $this->belongsToMany('Party');
    }
    
    /**
    * The rules required to validate a new website.
    *
    * @var array
    */
    public static $rules = array('name' => 'required',
                                 'email' => 'required|email',);
    
    /**
    * The unique error message returned with validator.
    *
    * @var array
    */
    public static $messages = array('name' => 'A name is required.',
                                    'email' => 'Please enter a valid email.',);
    
}