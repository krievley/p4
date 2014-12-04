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
            //print_r($parties->first()->website);
            return View::make('members/dashboard')
                    ->with('parties', $parties);
        }
        
        //Display the form to add a party.
        public function getAdd() {
            return View::make('members/add');
        }
        
        //Function to process the form.
        public function postAdd() {
            //Add party to the database.
            $party = new Party;
            $party->user_id = Auth::id();
            $party->name = Input::get('name');
            $party->theme = Input::get('theme');
            $party->provided_items = Input::get('items');
            $party->location = Input::get('location');
            $party->attire = Input::get('attire');
            $party->alcohol = Input::get('alcohol');
            
            do {
                //Assign random string to website.
                $website = str_random(20);
                $validator = Validator::make(array ('website' => $website),
                                                array ('website' => array('unique:parties,website')));
                //Keep looping until website is unique.
            } while ($validator->fails());
            
            //Save new party to database.
            $party->website = $website;
            $party->save();
            
            return Redirect::to('members/dashboard')
                    ->with('flash_message', 'Your party has been added.');
        }
}

