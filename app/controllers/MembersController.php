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
        
        //Display the user's dashboard.
        public function getDashboard() {
            $id = Auth::id();
            $parties = User::find($id)->parties;
            return View::make('members/dashboard')
                    ->with('parties', $parties);
        }
        
        //Display the form to add a party.
        public function getAdd() {
            return View::make('members/add');
        }
        
        //Function to process the form.
        public function postAdd() {
            
        }
}

