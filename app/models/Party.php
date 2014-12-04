<?php

/* 
 * Model to represent the parties table.
 */

class Party extends Eloquent {
    /**
    * The following functions represent the relationships
    * of the Party model to other models
    *
    * @var function
    */
    //Party belongs to User
    public function user() {
        return $this->belongsTo('User');
    }
    
    /**
    * The rules required to validate a new website.
    *
    * @var array
    */
    public static $rules = array('website' => 'unique:parties,website');
}