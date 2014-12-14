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
}