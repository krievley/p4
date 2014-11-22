<?php

class MembersController extends BaseController {
    
    /*
	|--------------------------------------------------------------------------
	| Default Members Controller
	|--------------------------------------------------------------------------
	|
	| This Controller handles the pages for all members.
	|
	*/
        
        // Instantiate a new MembersController instance.
        public function __construct()
        {
            //Authorization filter applied to all member pages.
            $this->beforeFilter('auth', array('all'));
        }
        
        public function getDashboard() {
            return View::make('members/dashboard');
        }
}

