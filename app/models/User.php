<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        /**
	 * The rules required to validate a new user.
	 *
	 * @var array
	 */
        public static $rules = array('email' => 'required|email|unique:users,email',
                                'password' => 'required|min:6');
        
        /**
	 * The unique error message returned with validator.
	 *
	 * @var array
	 */
        public static $messages = array('email' => array('required' => 'The email field is required.',
                                                         'email.email' => 'The email must be valid.',
                                                         'email.unique' => 'The email you entered has already been used.'),
                                        'password' => 'The password must be a minimum of six characters.');
        /**
        * The following functions represent the relationships
        * of the User model to other models
        *
        * @var function
        */
        public function parties() {
            return $this->hasMany('Party');
        }
}
