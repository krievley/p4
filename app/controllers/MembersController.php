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
            $today = date('dd/mm/yyyy');
            //print_r($parties->first()->website);
            return View::make('members/dashboard')
                    ->with('parties', $parties)
                    ->with('today', $today);
        }
        
        //Display the form to add a party.
        public function getAdd() {
            return View::make('members/add');
        }
        
        //Function to process the add party form.
        public function postAdd() {
            //Convert date from input.
            $date = new DateTime();
            $date->setDate(Input::get('year'), Input::get('month'), Input::get('day'));
            
            //Add party to the database.
            $party = new Party;
            $party->user_id = Auth::id();
            $party->host = Input::get('host');
            $party->name = Input::get('name');
            $party->date = $date;
            $party->start_time = Input::get('start_hour') . ':' . Input::get('start_minute') . ' ' . Input::get('start_ampm');
            $party->end_time = Input::get('end_hour') . ':' . Input::get('end_minute') . ' ' . Input::get('end_ampm');
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
        
        //Displays the form to edit a party.
        public function getEdit($id) {
            $party = Party::find($id);
            return View::make('members/edit')
                    ->with('party', $party);
        }
        
        //Processes the edit form.
        public function postEdit() {
            //Transform user input to date.
            $date = new DateTime();
            $date->setDate(Input::get('year'), Input::get('month'), Input::get('day'));
            //Update database
            Party::where('id', '=', Input::get('id'))
                    ->update(array('host' => Input::get('host'),
                                    'name' => Input::get('name'),
                                    'date' => $date,
                                    'start_time' => Input::get('start_hour') . ':' . Input::get('start_minute') . ' ' . Input::get('start_ampm'),
                                    'end_time' => Input::get('end_hour') . ':' . Input::get('end_minute') . ' ' . Input::get('end_ampm'),
                                    'theme' => Input::get('theme'),
                                    'provided_items' => Input::get('provided_items'),
                                    'location' => Input::get('location'),
                                    'attire' => Input::get('attire'),
                                    'alcohol' => Input::get('alcohol')));
        }
        
        //Function to delete a party.
        public function getDelete($id) {
            //Find party by id and delete it.
            $party = Party::destroy($id);
            
            //Return back to dashboard.
            return Redirect::back();
        }
}

