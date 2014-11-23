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
}