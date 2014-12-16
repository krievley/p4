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
    
    public function guests() {
        return $this->belongsToMany('Guest');
    }
    
    /**
    * The rules required to validate a new website.
    *
    * @var array
    */
    public static $rules = array('year' => 'not_in:none',
                                 'month' => 'not_in:none',
                                 'day' => 'not_in:none',
                                 'name' => 'required',);
    
    /**
    * The unique error message returned with validator.
    *
    * @var array
    */
    public static $messages = array('name' => 'The party name is required.',
                                    'year' => 'Please select a valid year.',
                                    'month' => 'Please select a valid month.',
                                    'day' => 'Please select a valid day.');
    
    /**
    * The rules required to send an email.
    *
    * @var array
    */
    public static $invite_rules = array('to' => 'required|email',
                                        'from' => 'required|email',
                                        'subject' => 'required',
                                        'message' => 'required',);
    
    /**
    * The unique error message returned with validator.
    *
    * @var array
    */
    public static $invite_messages = array('to' => 'A valid email is required.',
                                            'from' => 'A valid email is required.',
                                            'subject' => 'Please write a subject.',
                                            'message' => 'Please write a message.');

    /**
    * Model Events
    *
    * @var function
    */
    public static function boot() {
        parent::boot();
        static::deleting(function($party) {
            DB::statement('DELETE FROM guest_party WHERE party_id = ?', array($party->id));
        });
    }
}